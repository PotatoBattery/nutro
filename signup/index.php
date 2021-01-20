<?php
    include '../resources/php/translate/translate.php';
    include '../resources/php/themes/themes.php';
    include '../resources/php/db.php';
    /** @var  $translate */
    /** @var  $lang */
    /** @var  $themes */
    /** @var  $tm */
    require '../resources/php/signup.php';
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $translate[$lang]['signup']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./../resources/css/main.css">
    </head>
    <body>
    <div class="wrap <?= $themes[$tm]['wrap'] ?>">
        <? require '../resources/php/links/arrow_back_link.php'; ?>
        <div class="title-container">
            <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                <h1 class="page-title-m"><?= $translate[$lang]['signup']['title'] ?></h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="index.php" method="post">
                    <input type="email" name="email" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['signup']['email'] ?>">
                    <input type="password" name="password" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['signup']['pass'] ?>">
                    <button type="submit" class="button <?= $themes[$tm]['button-fill'] ?> button-m button-submit-signup"><?= $translate[$lang]['signup']['submit'] ?></button>
                </form>
            </div>
        </div>
    </div>
    <script src="../resources/javascript/jquery.js"></script>
    <script src="../resources/javascript/main.js"></script>
    </body>
</html>
