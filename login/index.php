<?php
    include '../resources/php/translate/translate.php';
    include '../resources/php/themes/themes.php';
    /** @var  $translate */
    /** @var  $lang */
    /** @var  $themes */
    /** @var  $tm */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $translate[$lang]['login']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/main.css">
    </head>
    <body>
    <div class="wrap <?= $themes[$tm]['wrap'] ?>">
        <? require '../resources/php/links/arrow_back_link.php'; ?>
        <div class="title-container">
            <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                <h1 class="page-title-m"><?= $translate[$lang]['login']['header'] ?></h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="" class="signin-form">
                    <input type="email" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['login']['email'] ?>">
                    <input type="password" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['login']['pass'] ?>">
                    <button class="button <?= $themes[$tm]['button-fill'] ?> button-s button-submit-signin"><?= $translate[$lang]['login']['submit'] ?></button>
                </form>
                <a href="/signup/" class="<?= $themes[$tm]['signup-link'] ?>"><?= $translate[$lang]['login']['signup'] ?></a>
            </div>
        </div>
        <? require '../resources/php/links/settings_link.php'; ?>
    </div>
    </body>
</html>

