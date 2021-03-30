<?php
    include '../resources/php/translate/translate.php';
    /** @var  $translate */
    /** @var  $lang */
    include '../resources/php/themes/themes.php';
    /** @var  $themes */
    /** @var  $tm */
    include '../resources/php/cookies/cookie_control.php';
    /** @var  $is_auth */
    switch ($lang){
        case 'ru':
            $ru_checked = 'checked';
            $en_checked = '';
            break;
        case 'en':
            $ru_checked = '';
            $en_checked = 'checked';
            break;
        default:
            $ru_checked = 'checked';
            $en_checked = '';
            break;
    }
    switch ($tm){
        case 'wb':
            $color_checked = 'checked';
            break;
        case 'color':
            $color_checked = '';
            break;
        default:
            $color_checked = '';
            break;
    }
    if(htmlspecialchars($_SERVER['HTTP_REFERER']) != 'http://nutro.local/settings/')
    {
        setcookie('page', htmlspecialchars($_SERVER['HTTP_REFERER']), (time()+86400*30), "/", "nutro.local");
    }
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
        <title><?= $translate[$lang]['settings']['title'] ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../resources/css/main.css">
    </head>
    <body>
        <div class="wrap <?= $themes[$tm]['wrap'] ?>">
            <? require '../resources/php/links/arrow_back_link.php'; ?>
            <div class="title-container">
                <div class="page-title <?= $themes[$tm]['text-white'] ?>">
                    <h1 class="page-title-m"><?= $translate[$lang]['settings']['header'] ?></h1>
                </div>
            </div>
            <div class="content">
                <div class="block">
                    <div class="setting-menu-item <?= $themes[$tm]['menu-items'] ?>">
                        <label for="color"><?= $translate[$lang]['settings']['theme'] ?></label>
                        <input type="checkbox" name="color" id="color" onclick="changeColorTheme(this)" <?= $color_checked ?>>
                        <label for="color"></label>
                    </div>
                    <div class="setting-menu-item <?= $themes[$tm]['menu-items'] ?>">
                        <label for="language"><?= $translate[$lang]['settings']['lang'] ?></label>
                        <a href="javascript:showLanguageOptions();" id="language" class="language-link <?= $themes[$tm]['menu-items_link'] ?>"><?= $ru_checked != '' ? 'Русский' : 'English' ?></a>
                        <div id="language-options" class="language-options <?= $themes[$tm]['language-options'] ?>">
                            <div class="language-option">
                                <input type="radio" name="lang" id="lang-ru" value="ru" onclick="checkType()" <?= $ru_checked ?>><label for="lang-ru" class="<?= $themes[$tm]['language-options_label'] ?>">Русский</label>
                            </div>
                            <div class="language-option">
                                <input type="radio" name="lang" id="lang-en" value="en" onclick="checkType()" <?= $en_checked ?>><label for="lang-en" class="<?= $themes[$tm]['language-options_label'] ?>">English</label>
                            </div>
                        </div>
                    </div>
                    <div class="setting-menu-item <?= $themes[$tm]['menu-items'] ?>">
                        <a href="#" class="<?= $themes[$tm]['menu-items_link'] ?>"><?= $translate[$lang]['settings']['after'] ?></a>
                    </div>
                    <div class="setting-menu-item <?= $themes[$tm]['menu-items'] ?>">
                        <a href="/about/" class="<?= $themes[$tm]['menu-items_link'] ?>"><?= $translate[$lang]['settings']['about'] ?></a>
                    </div>
                    <? if ($is_auth) { ?>
                        <div class="setting-menu-item <?= $themes[$tm]['menu-items'] ?>">
                            <a href="" id="logout_link" class="<?= $themes[$tm]['menu-items_link'] ?>"><?= $translate[$lang]['settings']['logout'] ?></a>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
        <script src="./../resources/javascript/jquery.js"></script>
        <script src="../resources/javascript/main.js"></script>
        <script>
            $('#logout_link').on("click", function(e){
                e.preventDefault();
                $.ajax({
                    type:'post',
                    url:'/resources/php/cookies/cookie_logout.php',
                    success:function(result){
                        document.location.replace('http://nutro.local/');
                    }
                });
            })
        </script>
    </body>
</html>