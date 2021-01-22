<?php
    include 'db.php';
    /** @var  $db_link */
    include './translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
    $errors = array();
    if((isset($_POST['value']) && isset($_POST['field'])) && ($_POST['value'] != '' && $_POST['field'] != '')){
        if($_POST['field'] == 'email'){
            $email = trim(strip_tags(htmlspecialchars($_POST['value'])));
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(mysqli_num_rows(mysqli_query($db_link, "SELECT user_id FROM users WHERE email = '".$email."'")) > 0){
                    array_push($errors, $translate[$lang]['profile']['errors']['user_exist']);
                }
            }else{
                array_push($errors, $translate[$lang]['profile']['errors']['email_not_valid']);
            }
        }
        if(count($errors) == 0){
            @mysqli_query($db_link, "UPDATE users SET ".$_POST['field']."='".$_POST['value']."'");
            $result = '';
        }else{
            $result = $errors[0];
        }
        echo $result;
    }