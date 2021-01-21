<?php
    /** @var  $db_link */
    if((isset($_COOKIE['userID']) && isset($_COOKIE['userHash'])) && ($_COOKIE['userID'] != '' && $_COOKIE['userHash'] != '')){
        $query = mysqli_query($db_link, "SELECT user_id, cookie_hash FROM auth_users WHERE user_id = ".intval($_COOKIE['userID']));
        if(mysqli_num_rows($query) > 0){
            $cookie_data = mysqli_fetch_assoc($query);
            if($cookie_data['cookie_hash'] != $_COOKIE['userHash']){
                @mysqli_query($db_link, "DELETE FROM auth_users WHERE user_id = ".intval($_COOKIE['userID']));
                $is_auth = false;
            }else{
                $is_auth = true;
            }
        }
    }else{
        $is_auth = false;
    }
