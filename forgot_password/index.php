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
require '../resources/php/forgot_password.php';
/** @var  $errors */
/** @var  $success */
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <title><?= $translate[$lang]['forgot_password']['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../resources/css/main.css">
</head>
<body>
<div class="wrap <?= $themes[$tm]['wrap'] ?>">
    <? if(!$success) { ?>
        <? require '../resources/php/links/arrow_back_link.php'; ?>
        <div class="title-container">
            <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                <h1 class="page-title-m"><?= $translate[$lang]['forgot_password']['title'] ?></h1>
            </div>
        </div>
        <div class="content">
            <div class="block">
                <form action="/forgot_password/" method="post">
                    <input type="email" name="email" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['forgot_password']['email'] ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <input type="password" name="password" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['forgot_password']['pass'] ?>" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                    <input type="password" name="confirm_password" class="field <?= $themes[$tm]['field'] ?>" placeholder="<?= $translate[$lang]['forgot_password']['confirm_pass'] ?>" value="<?= isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '' ?>">
                    <button type="submit" class="button <?= $themes[$tm]['button-fill'] ?> button-m button-submit-signup"><?= $translate[$lang]['forgot_password']['submit'] ?></button>
                </form>
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
    <? } else { ?>
        <div class="content content-without-title">
            <div class="block">
                <p>
                    <?= $translate[$lang]['forgot_password']['change_password_message'] ?>
                </p>
                <button class="button <?= $themes[$tm]['button-fill'] ?> button-s button-submit-signup_end " id="send_to_home"><?= $translate[$lang]['signup']['success'] ?></button>
            </div>
        </div>
    <? } ?>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    $('#send_to_home').on('click', function (){
        document.location.replace('http://nutro.local/');
    })
</script>
</body>
</html>
