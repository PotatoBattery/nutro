<?php
    include './resources/php/db.php';
    include './resources/php/cookies/cookie_control.php';
    /** @var  $is_auth */
    include './resources/php/translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
    include './resources/php/themes/themes.php';
    /** @var  $themes */
    /** @var  $tm */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
        <title><?= $translate[$lang]['mainpage']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./resources/css/main.css">
    </head>
    <body>
        <div class="wrap <?= $themes[$tm]['wrap'] ?>">
            <? if($is_auth) require './resources/php/links/profile_link.php'; ?>
            <? require './resources/php/links/statistic_link.php'; ?>
            <div class="title-container">
                <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                    <h1 class="page-title-l timer" id="selected_time">10:00</h1>
                </div>
            </div>
            <? require './resources/php/timer_values.php' ?>
            <div class="content content-with-timer">
                <div class="block">
                    <a href="#" class="<?= $themes[$tm]['music-link'] ?>" id="music">звуки леса</a>
                    <button class="button <?= $themes[$tm]['button-fill'] ?> button-s button-start" id="start_but"><?= $translate[$lang]['mainpage']['start_but'] ?></button>
                    <button class="button <?= $themes[$tm]['button-transparent'] ?> button-pause hidden"><?= $translate[$lang]['mainpage']['pause'] ?></button>
                    <button class="button <?= $themes[$tm]['button-transparent'] ?> button-start hidden" id="reset_pause"><?= $translate[$lang]['mainpage']['continue'] ?></button>
                    <button class="button <?= $themes[$tm]['button-fill'] ?> button-end hidden"><?= $translate[$lang]['mainpage']['end'] ?></button>
                    <? if (!$is_auth) { ?>
                        <a href="/signin/" class="<?= $themes[$tm]['signin-link-btn'] ?>" id="signin-btn">Войдите, чтобы отслеживать прогресс</a>
                    <? } ?>
                </div>
            </div>
            <? require './resources/php/links/settings_link.php'; ?>
        </div>
        <script src="resources/javascript/jquery.js"></script>
        <script src="resources/javascript/redirect.js"></script>
        <script src="resources/javascript/main.js"></script>
        <script src="resources/javascript/for_timer.js"></script>
    </body>
</html>
