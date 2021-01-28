<?php
    include '../resources/php/db.php';
    /** @var  $db_link */
    include '../resources/php/cookies/cookie_control.php';
    /** @var  $is_auth */
    if(!$is_auth) header('Location: http://nutro.local/');
    include '../resources/php/translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
    include '../resources/php/themes/themes.php';
    /** @var  $themes */
    /** @var  $tm */
    $days_query = mysqli_query($db_link, "SELECT `count` FROM `days_in_row` WHERE `user_id` = ".intval($_COOKIE['userID']));
    if(mysqli_num_rows($days_query) > 0){
        $days_data = mysqli_fetch_assoc($days_query);
        $days = $days_data['count'];
    }else{
        $days = 0;
    }
    $count_query = mysqli_query($db_link, "SELECT SUM(count_of_meditation) AS `cnt` FROM `statistic_of_meditaion` WHERE `user_id` = ".intval($_COOKIE['userID']));
    if(mysqli_num_rows($count_query) > 0){
        $count_data = mysqli_fetch_assoc($count_query);
        $count = $count_data['cnt'];
    }else{
        $count = 0;
    }
    $time_query =  mysqli_query($db_link, "SELECT `time_of_meditation` FROM `statistic_of_meditaion` WHERE `user_id` = ".intval($_COOKIE['userID']));
    if(mysqli_num_rows($time_query) > 0){
        $minutes = 0;
        $seconds = 0;
        while($time_data = mysqli_fetch_assoc($time_query)){
            $tmp = explode('.', $time_data['time_of_meditation']);
            $minutes += intval($tmp[0]);
            $seconds += intval($tmp[1]);
        }
        if($seconds == 60){
            $minutes += 1;
        }elseif ($seconds > 60){
            $tmp_sec = $seconds%60;
            $tmp_min = $seconds/60;
            $minutes += $tmp_min;
            if($tmp_sec >= 30){
                $minutes += 1;
            }
        }
        $time = $minutes;
    }else{
        $time = 0;
    }
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $translate[$lang]['statistic']['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/main.css">
    <link rel="stylesheet" href="../resources/javascript/morris.js/morris.css">
</head>
<body>
<div class="wrap <?= $themes[$tm]['wrap'] ?>">
    <? require '../resources/php/links/arrow_back_link.php'; ?>
    <? require '../resources/php/links/profile_link.php'; ?>
    <div class="title-container statistic-title">
        <div class="page-title <?= $themes[$tm]['text-white'] ?>">
            <h1 class="page-title-sm"><?= $translate[$lang]['statistic']['header'] ?></h1>
        </div>
    </div>
    <div class="content content-with-common-statistic-result">
        <div class="block">
            <div class="statistic_data">
                <div class="statistic_data-item">
                    <div class="statistic_data-value"><?= $time ?></div>
                    <div class="statistic_data-message"><?= $translate[$lang]['statistic']['minutes'] ?></div>
                </div>
                <div class="statistic_data-item">
                    <div class="statistic_data-value"><?= $count ?></div>
                    <div class="statistic_data-message"><?= $translate[$lang]['statistic']['meditations'] ?></div>
                </div>
                <div class="statistic_data-item">
                    <div class="statistic_data-value"><?= $days ?></div>
                    <div class="statistic_data-message"><?= $translate[$lang]['statistic']['days'] ?></div>
                </div>
            </div>
            <div class="statistic_graph">
                <div id="chart" class="chart"></div>
            </div>
            <button class="button <?= $themes[$tm]['button-transparent'] ?> button-share button-statistic"><?= $translate[$lang]['statistic']['share'] ?></button>
        </div>
    </div>
    <? require '../resources/php/links/settings_link.php'; ?>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/raphael/raphael.min.js"></script>
<script src="../resources/javascript/morris.js/morris.min.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    $.getJSON("../resources/php/data_for_chart.php", function (json) {
        Morris.Line({
            element: 'chart',
            resize: true,
            data: json,
            xkey: 'x',
            ykeys: ['y'],
            labels: ['<?= $translate[$lang]['statistic']['yLabel'] ?>'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto',
            xLabelFormat: function (d) {
                return ("0" + d.getDate()).slice(-2) + '.' + ("0" + (d.getMonth() + 1)).slice(-2) + '.' + d.getFullYear();
            },
            yLabelFormat: function(y){
                return y.toString() + 'м.'
            }
        });
    });
    // let line = new Morris.Line({
    //     element: 'chart',
    //     resize: true,
    //     data: [
    //         {x: '23.01.2021', item1: 15},
    //         {x: '24.01.2021', item1: 23},
    //         {x: '25.01.2021', item1: 25},
    //         {x: '26.01.2021', item1: 40},
    //         {x: '27.01.2021', item1: 32},
    //         {x: '28.01.2021', item1: 0},
    //         {x: '29.01.2021', item1: 50},
    //         {x: '30.01.2021', item1: 10},
    //     ],
    //     xkey: 'x',
    //     ykeys: ['item1'],
    //     labels: ['Минут медитации'],
    //     lineColors: ['#3c8dbc'],
    //     hideHover: 'auto',
    //     yLabelFormat: function(y){
    //         return y.toString() + 'м.'
    //     }
    // });
</script>
</body>
</html>
