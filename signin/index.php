<?php
    include '../resources/php/db.php';
    include '../resources/php/cookies/cookie_control.php';
    /** @var  $is_auth */
    if($is_auth) header('Location: http://nutro.local/');
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
        <title><?= $translate[$lang]['signin']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/main.css">
    </head>

    <body>
        <div class="wrap <?= $themes[$tm]['wrap'] ?>">
            <? require '../resources/php/links/arrow_back_link.php'; ?>
            <div class="title-container">
                <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                    <h1 class="page-title-m"><?= $translate[$lang]['signin']['header'] ?></h1>
                </div>
            </div>
            <div class="content">
                <div class="block">
                    <button class="button <?= $themes[$tm]['button-transparent'] ?>" id="email_button"><?= $translate[$lang]['signin']['common'] ?></button>
                    <button class="button <?= $themes[$tm]['button-fill'] ?>"><?= $translate[$lang]['signin']['facebook'] ?></button>
                    <button class="button <?= $themes[$tm]['button-fill'] ?>"><?= $translate[$lang]['signin']['google'] ?></button>
                </div>
            </div>
            <? require '../resources/php/links/settings_link.php'; ?>
            <script src="../resources/javascript/jquery.js"></script>
            <script src="../resources/javascript/main.js"></script>
            <script>
                $('#email_button').click(function(){
                    location.href = '/login/';
                })
            </script>
        </div>
    </body>
</html>
