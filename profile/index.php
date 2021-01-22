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
    $profile_data = mysqli_fetch_assoc(mysqli_query($db_link, "SELECT email, firstname, lastname FROM users WHERE user_id = ".intval($_COOKIE['userID'])));
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $translate[$lang]['profile']['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/main.css">
</head>
<body>
<div class="wrap <?= $themes[$tm]['wrap'] ?>">
    <? require '../resources/php/links/arrow_back_link.php'; ?>
    <div class="title-container">
        <div class="page-title <?= $themes[$tm]['text-white'] ?>">
            <h1 class="page-title-m"><?= $translate[$lang]['profile']['header'] ?></h1>
        </div>
    </div>
    <div class="content">
        <div class="block">
            <div class="profile-list-item <?= $themes[$tm]['profile-list-item'] ?>">
                <label for="firstname"><?= $translate[$lang]['profile']['firstname'] ?></label>
                <a href="" class="firstname-link"><?= $profile_data['firstname'] ?></a>
                <? require '../resources/php/links/pencil.php'; ?>
                <input type="text" name="firstname" class="profile-input hidden">
                <? require '../resources/php/links/yes.php'; ?>
                <? require '../resources/php/links/no.php'; ?>
            </div>
            <div class="profile-list-item <?= $themes[$tm]['profile-list-item'] ?>">
                <label for="lastname"><?= $translate[$lang]['profile']['lastname'] ?></label>
                <a href="" class="lastname-link"><?= $profile_data['lastname'] ?></a>
                <? require '../resources/php/links/pencil.php'; ?>
                <input type="text" name="lastname" class="profile-input hidden">
                <? require '../resources/php/links/yes.php'; ?>
                <? require '../resources/php/links/no.php'; ?>
            </div>
            <div class="profile-list-item <?= $themes[$tm]['profile-list-item'] ?>">
                <label for="firstname"><?= $translate[$lang]['profile']['email'] ?></label>
                <a href="" class="email-link"><?= $profile_data['email'] ?></a>
                <? require '../resources/php/links/pencil.php'; ?>
                <input type="email" name="email" class="profile-input hidden">
                <? require '../resources/php/links/yes.php'; ?>
                <? require '../resources/php/links/no.php'; ?>
            </div>
            <div class="profile-list-item <?= $themes[$tm]['profile-list-item'] ?>">
                <a href="/change_password/" class="<?= $themes[$tm]['menu-items_link'] ?> profile-logout"><?= $translate[$lang]['profile']['ch_password'] ?></a>
            </div>
            <div class="profile-list-item <?= $themes[$tm]['profile-list-item'] ?>">
                <a href="" id="password_link" id="logout_link" class="<?= $themes[$tm]['menu-items_link'] ?> profile-password"><?= $translate[$lang]['profile']['logout'] ?></a>
            </div>
<!--            <div class="setting-menu-item --><?//= $themes[$tm]['menu-items'] ?><!--">-->
<!--                <label for="language">--><?//= $translate[$lang]['profile']['firstname'] ?><!--</label>-->
<!--                <a href="javascript:showNameInput();" id="name" class="language-link --><?//= $themes[$tm]['menu-items_link'] ?><!--">--><?//= $profile_data['firstname'] ?><!--</a>-->
<!--                <div id="language-options" class="language-options --><?//= $themes[$tm]['language-options'] ?><!--">-->
<!--                    <div class="language-option">-->
<!--                        <input type="radio" name="lang" id="lang-ru" value="ru" onclick="checkType()" --><?//= $ru_checked ?><!--<!-<label for="lang-ru" class="--><?//= $themes[$tm]['language-options_label'] ?><!--">Русский</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="<?= $themes[$tm]['errors'] ?> hidden" id="for_errors">
            </div>
        </div>
    </div>
    <? require '../resources/php/links/settings_link.php'; ?>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    $('#logout_link').on("click", function(e){
        e.preventDefault();
        $.ajax({
            type:'post',
            url:'/resources/php/cookies/cookie_logout.php',
            success:function(){
                document.location.replace('http://nutro.local/');
            }
        });
    });
    $('.pen').on('click', function (){
        let profile_item = $(this).parent();
        let link = profile_item.find('a');
        let label = profile_item.find('label');
        let pen = profile_item.find('.pen');
        let yes = profile_item.find('.yes');
        let no = profile_item.find('.no');
        let input = profile_item.find('.profile-input');
        link.addClass('hidden');
        label.addClass('hidden');
        pen.addClass('hidden');
        input.val(link.text())
        input.removeClass('hidden');
        yes.removeClass('hidden');
        no.removeClass('hidden');
    });
    $('.no').on('click', function(){
        let errors = $('#for_errors');
        let profile_item = $(this).parent();
        let link = profile_item.find('a');
        let label = profile_item.find('label');
        let pen = profile_item.find('.pen');
        let yes = profile_item.find('.yes');
        let no = profile_item.find('.no');
        let input = profile_item.find('.profile-input');
        link.removeClass('hidden');
        label.removeClass('hidden');
        pen.removeClass('hidden');
        input.addClass('hidden');
        yes.addClass('hidden');
        no.addClass('hidden');
        errors.addClass('hidden');
        errors.find('p').remove();
    });
    $('.yes').on('click', function(){
        let profile_item = $(this).parent();
        let link = profile_item.find('a');
        let label = profile_item.find('label');
        let pen = profile_item.find('.pen');
        let yes = profile_item.find('.yes');
        let no = profile_item.find('.no');
        let input = profile_item.find('.profile-input');
        $.ajax({
            type:'post',
            url:'/resources/php/profile.php',
            data: {
                value: input.val(),
                field: input.attr('name')
            },
            success:function(result){
                let errors = $('#for_errors');
                if(!result.trim()){
                    let new_value = input.val();
                    link.html(new_value);
                    link.removeClass('hidden');
                    label.removeClass('hidden');
                    pen.removeClass('hidden');
                    input.addClass('hidden');
                    yes.addClass('hidden');
                    no.addClass('hidden');
                    errors.addClass('hidden');
                    errors.find('p').remove();
                }else{
                    errors.removeClass('hidden');
                    errors.find('p').remove();
                    errors.html('<p>'+result+'</p>');
                }
            }
        });
    })


</script>
</body>
</html>
