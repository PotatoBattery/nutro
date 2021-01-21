<?php
    /** @var  $db_link */
    /** @var  $translate */
    /** @var  $lang */
    $errors = array();
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = trim(strip_tags(htmlspecialchars($_POST['email'])));
        $password = trim($_POST['password']);
        $query = mysqli_query($db_link, "SELECT user_id, enable, email, password FROM users WHERE email = '".$email."'");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            if(!password_verify($password, $data['password'])){
                array_push($errors, $translate[$lang]['login']['errors']['wrong_password']);
            }else{
                if(intval($data['enable']) == 0){
                    array_push($errors, $translate[$lang]['login']['errors']['user_not_active']);
                }else{
                    $uid = intval($data['user_id']);
                    $userHash = md5(($data['email'].time().rand(0, 10000000)));
                    setcookie('userID', $uid, (time()+86400*30), "/", "nutro.local");
                    setcookie('userHash', $userHash, (time()+86400*30), "/", "nutro.local");
                    @mysqli_query($db_link, "INSERT INTO auth_users (user_id, cookie_hash) VALUES ( ".$uid.", '".$userHash."')");
                    header('Location: http://nutro.local/profile/');
                }
            }
        }else{
            array_push($errors, $translate[$lang]['login']['errors']['user_not_exist']);
        }
    }
