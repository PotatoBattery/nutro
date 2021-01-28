<?php
    /** @var  $db_link */
    $today = date('Y-m-d');
    $yesterday = date('Y-m-d',strtotime("-1 days"));
    $uid = intval($_COOKIE['userID']);
    $query = mysqli_query($db_link, "SELECT `date_time_value`, `time_of_meditation`, `count_of_meditation` FROM `statistic_of_meditaion` WHERE `day` = '".$today."' AND `user_id` = ".$uid);
    if(mysqli_num_rows($query) > 0){
        $statistic_data = mysqli_fetch_assoc($query);
        $count = intval($statistic_data['count_of_meditation']);
        $tmp_base_time = explode('.', $statistic_data['time_of_meditation']);
        $tmp_current_time = explode('.', $_POST['time']);
        $minutes = intval($tmp_base_time[0])+intval($tmp_current_time[0]);
        $seconds = intval($tmp_base_time[1])+intval($tmp_current_time[1]);
        if($seconds >= 60){
            $minutes = $minutes + 1;
            $new_seconds = $seconds - 60;
            $time_for_base = $minutes.'.'.$new_seconds;
        }else{
            $time_for_base = $minutes.'.'.$seconds;
        }
        $time = $minutes;
        $date_query = mysqli_query($db_link, "SELECT `date_time_value` FROM `statistic_of_meditaion` WHERE `day` = '".$yesterday."' AND `user_id` = ".$uid);
        if(mysqli_num_rows($date_query) > 0){
            $yesterday_data = mysqli_fetch_assoc($date_query);
            $flag = (intval($statistic_data['date_time_value']) - intval($yesterday_data['date_time_value']))/(60 * 60);
            if($flag >= 24){
                if(mysqli_num_rows(mysqli_query($db_link, "SELECT `id` FROM `days_in_row` WHERE `user_id` = ".$uid)) > 0){
                    @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = 1, update_date ='".$today."' WHERE`user_id` = ".$uid);
                }else{
                    @mysqli_query($db_link, "INSERT INTO `days_in_row` (`user_id`, `count`, `update_date`) VALUES (".$uid.", 1, '".$today."')");
                }
            }else{
                $update_date_query = mysqli_query($db_link, "SELECT `update_date` FROM `days_in_row` WHERE `user_id` = ".$uid);
                if(mysqli_num_rows($update_date_query) > 0){
                    $update_date_data = mysqli_fetch_assoc($update_date_query);
                    if($update_date_data['update_date'] != $today){
                        @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = `count`+1, update_date ='".$today."' WHERE`user_id` = ".$uid);
                    }
                }else{
                    @mysqli_query($db_link, "INSERT INTO `days_in_row` (`user_id`, `count`, `update_date`) VALUES (".$uid.", 1, '".$today."')");
                }
            }
        }else{
            @mysqli_query($db_link, "INSERT INTO `statistic_of_meditaion` (`user_id`, `date_time_value`, `count_of_meditation`, `time_of_meditation`, `day`) VALUES (".$uid.", '".(time() - 60*60*24)."', 0, 0,'".$yesterday."')");
            @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = 1, update_date ='".$today."' WHERE`user_id` = ".$uid);
        }
        @mysqli_query($db_link, "UPDATE `statistic_of_meditaion` SET `count_of_meditation` = `count_of_meditation`+1, `time_of_meditation` ='".$time_for_base."' WHERE `day` = '".$today."' AND `user_id` = ".$uid);
    }else{
        $tmp_current_time = explode('.', $_POST['time']);
        $minutes = intval($tmp_current_time[0]);
        $seconds = intval($tmp_current_time[1]);
        $time_for_base = $minutes.'.'.$seconds;
        $time = $minutes;
        $count = 1;
        @mysqli_query($db_link, "INSERT INTO `statistic_of_meditaion` (`user_id`, `date_time_value`, `count_of_meditation`, `time_of_meditation`, `day`) VALUES (".$uid.", '".time()."', 1, '".$time_for_base."','".$today."')");
        $date_query = mysqli_query($db_link, "SELECT `date_time_value` FROM `statistic_of_meditaion` WHERE `day` = '".$yesterday."' AND `user_id` = ".$uid);
        if(mysqli_num_rows($date_query) > 0){
            $yesterday_data = mysqli_fetch_assoc($date_query);
            $flag = (intval(time()) - intval($yesterday_data['date_time_value']))/(60 * 60);
            if($flag >= 24){
                if(mysqli_num_rows(mysqli_query($db_link, "SELECT `id` FROM `days_in_row` WHERE `user_id` = ".$uid)) > 0){
                    @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = 1, update_date ='".$today."' WHERE`user_id` = ".$uid);
                }else{
                    @mysqli_query($db_link, "INSERT INTO `days_in_row` (`user_id`, `count`, `update_date`) VALUES (".$uid.", 1, '".$today."')");
                }
            }else{
                $update_date_query = mysqli_query($db_link, "SELECT `update_date` FROM `days_in_row` WHERE `user_id` = ".$uid);
                if(mysqli_num_rows($update_date_query) > 0){
                    $update_date_data = mysqli_fetch_assoc($update_date_query);
                    if($update_date_data['update_date'] != $today){
                        @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = `count`+1, update_date ='".$today."' WHERE`user_id` = ".$uid);
                    }
                }else{
                    @mysqli_query($db_link, "INSERT INTO `days_in_row` (`user_id`, `count`, `update_date`) VALUES (".$uid.", 1, '".$today."')");
                }
            }
        }else{
            @mysqli_query($db_link, "INSERT INTO `statistic_of_meditaion` (`user_id`, `date_time_value`, `count_of_meditation`, `time_of_meditation`, `day`) VALUES (".$uid.", '".(time() - 60*60*24)."', 0, 0,'".$yesterday."')");
            @mysqli_query($db_link, "UPDATE `days_in_row` SET `count` = 1, update_date ='".$today."' WHERE`user_id` = ".$uid);
        }
    }