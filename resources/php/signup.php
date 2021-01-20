<?php
    /** @var  $db_link */
    /** @var  $translate */
    /** @var  $lang */
    $errors = array();
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = trim(strip_tags(htmlspecialchars($_POST['email'])));
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if(mysqli_num_rows(mysqli_query($db_link, "SELECT user_id FROM users WHERE email = '".$email."'")) > 0){
                array_push($errors, $translate[$lang]['signup']['errors']['user_exist']);
            }
        }else{
            array_push($errors, $translate[$lang]['signup']['errors']['email_not_valid']);
        }
        if(strlen(trim($_POST['password'])) > 8){
            array_push($errors, $translate[$lang]['signup']['errors']['password_too_short']);
        }elseif (strlen(trim($_POST['password'])) < 32){
            array_push($errors, $translate[$lang]['signup']['errors']['password_too_long']);
        }
    }
?>