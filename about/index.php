<?php
    include '../resources/php/translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
        <title><?= $translate[$lang]['about']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/main.css">
    </head>
    <body>
        <div class="wrap wrap-color">
            <? require '../resources/php/links/arrow_back_link.php'; ?>
            <div class="title-container">
                <div class="page-title text-white">
                    <h1 class="page-title-m"><?= $translate[$lang]['about']['header'] ?></h1>
                </div>
            </div>
            <div class="content">
                <div class="block">
                    <p>
                        <?= $translate[$lang]['about']['information'] ?>
                    </p>
                </div>
            </div>
            <? require '../resources/php/links/settings_link.php'; ?>
        </div>
        <script src="./../resources/javascript/jquery.js"></script>
        <script src="../resources/javascript/main.js"></script>
    </body>
</html>
