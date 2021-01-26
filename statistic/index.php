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
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $translate[$lang]['meditation_result']['title'] ?></title>
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
            <h1 class="page-title-sm"><?= $translate[$lang]['meditation_result']['header'] ?></h1>
        </div>
    </div>
    <div class="content content-with-common-statistic-result">
        <div class="block">
            <div class="statistic_data">
                <div class="statistic_data-item">
                    <div class="statistic_data-value">195</div>
                    <div class="statistic_data-message">Минут медитаций всего</div>
                </div>
                <div class="statistic_data-item">
                    <div class="statistic_data-value">31</div>
                    <div class="statistic_data-message">Медитаций</div>
                </div>
                <div class="statistic_data-item">
                    <div class="statistic_data-value">2</div>
                    <div class="statistic_data-message">Дней подряд</div>
                </div>
            </div>
            <div class="statistic_graph">
                <div id="chart" class="chart"></div>
            </div>
            <button class="button <?= $themes[$tm]['button-transparent'] ?> button-share button-statistic"><?= $translate[$lang]['meditation_result']['share'] ?></button>
        </div>
    </div>
    <? require '../resources/php/links/settings_link.php'; ?>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/raphael/raphael.min.js"></script>
<script src="../resources/javascript/morris.js/morris.min.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    let line = new Morris.Line({
        element: 'chart',
        resize: true,
        data: [
            {y: '2021-01-23', item1: 15},
            {y: '2021-01-24', item1: 23},
            {y: '2021-01-25', item1: 25},
            {y: '2021-01-26', item1: 40},
            {y: '2021-01-27', item1: 32},
            {y: '2021-01-28', item1: 0},
            {y: '2021-01-29', item1: 50},
            {y: '2021-01-30', item1: 10},
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Минут медитации'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto',
        yLabelFormat: function(y){
            return y.toString() + 'м.'
        }
    });
</script>
</body>
</html>
