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
    require '../resources/php/login.php';
    /** @var  $errors */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
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
                <form action="/login/" method="post" class="signin-form">
                    <input type="email" name="email" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['login']['email'] ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <input type="password" name="password" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['login']['pass'] ?>">
                    <button class="button <?= $themes[$tm]['button-fill'] ?> button-s button-submit-signin"><?= $translate[$lang]['login']['submit'] ?></button>
                </form>
                <a href="/signup/" class="<?= $themes[$tm]['signup-link'] ?>"><?= $translate[$lang]['login']['signup'] ?></a>
                <a href="/forgot_password/" class="forgot_password_link <?= $themes[$tm]['signup-link'] ?>"><?= $translate[$lang]['login']['forgot_password'] ?></a>
                <? if(count($errors) > 0){ ?>
                    <div class="<?= $themes[$tm]['errors'] ?>">
                        <?
                        foreach ($errors as $error){
                            echo '<p>'.$error.'</p>';
                        }
                        ?>
                    </div>
                <? } ?>
            </div>
        </div>
        <? require '../resources/php/links/settings_link.php'; ?>
    </div>
    <script src="../resources/javascript/main.js"></script>
    </body>
</html>

