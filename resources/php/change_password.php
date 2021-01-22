<?php
    /** @var  $db_link */
    /** @var  $translate */
    /** @var  $lang */
    $errors = array();
    $success = false;
    if(isset($_POST['password']) && isset($_POST['confirm_password'])){
        if(strlen(trim($_POST['password'])) < 8){
            array_push($errors, $translate[$lang]['change_password']['errors']['password_too_short']);
        }elseif (strlen(trim($_POST['password'])) > 32){
            array_push($errors, $translate[$lang]['change_password']['errors']['password_too_long']);
        }elseif ($_POST['password'] != $_POST['confirm_password']){
            array_push($errors, $translate[$lang]['change_password']['errors']['passwords_not_equal']);
        }
        if(count($errors) == 0){
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
            $user_data = mysqli_fetch_assoc(mysqli_query($db_link, "SELECT email FROM users WHERE user_id = ".intval($_COOKIE['userID'])));
            $hash = md5($user_data['email'].$password);
            @mysqli_query($db_link, "UPDATE users SET enable = 0, password ='".$password."', tmp_hash = '".$hash."'");
            $message = sprintf($translate[$lang]['change_password']['for_email']['message'], $hash);
            mail($user_data['email'], $translate[$lang]['change_password']['for_email']['theme'], $message, $translate[$lang]['change_password']['for_email']['from']);
            @mysqli_query($db_link, "DELETE FROM auth_users WHERE user_id = ".intval($_COOKIE['userID']));
            setcookie('userID', '', (time()-3600), "/", "nutro.local");
            setcookie('userHash', '', (time()-3600), "/", "nutro.local");
            $success = true;
        }
    }