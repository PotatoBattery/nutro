<?php
    if(!isset($_POST['time']) || $_POST['time'] == '') header('Location: http://nutro.local/');
    include '../resources/php/db.php';
    /** @var  $db_link */
    include '../resources/php/cookies/cookie_control.php';
    /** @var  $is_auth */
    include '../resources/php/translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
    include '../resources/php/themes/themes.php';
    /** @var  $themes */
    /** @var  $tm */
    $text = mysqli_fetch_assoc(mysqli_query($db_link, "SELECT quote FROM quotes WHERE `local` = '".$lang."' ORDER BY RAND() LIMIT 1"));
    $time = explode('.', $_POST['time']);
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $translate[$lang]['meditation_result']['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/main.css">
</head>
<body>
<div class="wrap <?= $themes[$tm]['wrap'] ?>">
    <? if($is_auth) require '../resources/php/links/profile_link.php'; ?>
    <? require '../resources/php/links/statistic_link.php'; ?>
    <div class="title-container">
        <div class="page-title <?= $themes[$tm]['text-white'] ?>">
            <h1 class="page-title-sm"><?= $translate[$lang]['meditation_result']['header'] ?></h1>
        </div>
    </div>
    <div class="content content-with-statistic-result">
        <div class="block">
            <div class="statistic-result">
                <div class="result">
                    <div class="result-count">
                        <?= $time[0] ?>
                    </div>
                    <div class="result-title">
                        <?= $time[0] < 10 ? $translate[$lang]['meditation_result']['minute'] : $translate[$lang]['meditation_result']['minutes'] ?>
                    </div>
                </div>
                <div class="result">
                    <div class="result-count">
                        2
                    </div>
                    <div class="result-title">
                        <?= $translate[$lang]['meditation_result']['count'] ?>
                    </div>
                </div>
                <div class="result-quote">
                    &laquo;<?= $text['quote'] ?>&raquo;
                </div>
            </div>
            <? if($is_auth){ ?>
                <button class="button <?= $themes[$tm]['button-transparent'] ?> button-statistic"><?= $translate[$lang]['meditation_result']['statistic']['ok'] ?></button>
            <? } ?>
            <button class="button <?= $themes[$tm]['button-fill'] ?> button-statistic" id="start_again"><?= $translate[$lang]['meditation_result']['statistic']['again'] ?></button>
            <button class="button <?= $themes[$tm]['button-transparent'] ?> button-share button-statistic"><?= $translate[$lang]['meditation_result']['share'] ?></button>
        </div>
    </div>
    <? require '../resources/php/links/settings_link.php'; ?>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    $('#start_again').click(function(){
        document.location.replace('http://nutro.local/');
    });
</script>
</body>
</html>
