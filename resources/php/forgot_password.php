<?php
    /** @var  $db_link */
    /** @var  $translate */
    /** @var  $lang */
    $errors = array();
    $success = false;
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = trim(strip_tags(htmlspecialchars($_POST['email'])));
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(mysqli_num_rows(mysqli_query($db_link, "SELECT user_id FROM users WHERE email = '".$email."'")) == 0){
                array_push($errors, $translate[$lang]['forgot_password']['errors']['user_not_exist']);
            }
        }
        if(strlen(trim($_POST['password'])) < 8){
            array_push($errors, $translate[$lang]['forgot_password']['errors']['password_too_short']);
        }elseif (strlen(trim($_POST['password'])) > 32){
            array_push($errors, $translate[$lang]['forgot_password']['errors']['password_too_long']);
        }elseif ($_POST['password'] != $_POST['confirm_password']){
            array_push($errors, $translate[$lang]['forgot_password']['errors']['passwords_not_equal']);
        }
        if(count($errors) == 0){
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            $hash = md5($email.$password);
            @mysqli_query($db_link, "UPDATE users SET enable = 0, password ='".$password."', tmp_hash = '".$hash."'");
            $message = sprintf($translate[$lang]['forgot_password']['for_email']['message'], $hash);
            mail($email, $translate[$lang]['forgot_password']['for_email']['theme'], $message, $translate[$lang]['forgot_password']['for_email']['from']);
            setcookie('userID', '', (time()-3600), "/", "nutro.local");
            setcookie('userHash', '', (time()-3600), "/", "nutro.local");
            $success = true;
        }
    }