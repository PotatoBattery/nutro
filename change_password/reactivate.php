<?php
include '../resources/php/translate/translate.php';
/** @var  $translate */
/** @var  $lang */
include '../resources/php/themes/themes.php';
/** @var  $themes */
/** @var  $tm */
include '../resources/php/db.php';
/** @var  $db_link */
if(isset($_GET['profile']) && $_GET['profile'] != ''){
    $query = mysqli_query($db_link, "SELECT user_id FROM users WHERE tmp_hash = '".$_GET['profile']."'");
    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_assoc($query);
        mysqli_query($db_link, "UPDATE users SET enable = 1, tmp_hash = ''");
    }else{
        header('Location: http://nutro.local/');
    }
}else{
    header('Location: http://nutro.local/');
}

?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $translate[$lang]['change_password']['title'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./../resources/css/main.css">
</head>
<body>
<div class="wrap <?= $themes[$tm]['wrap'] ?>">
    <div class="content content-without-title">
        <div class="block">
            <p>
                <?= $translate[$lang]['change_password']['signip_end_message'] ?>
            </p>
            <button class="button <?= $themes[$tm]['button-fill'] ?> button-s button-submit-signup_end " id="send_to_home"><?= $translate[$lang]['change_password']['signin'] ?></button>
        </div>
    </div>
</div>
<script src="../resources/javascript/jquery.js"></script>
<script src="../resources/javascript/main.js"></script>
<script>
    $('#send_to_home').on('click', function (){
        document.location.replace('http://nutro.local/login/');
    })
</script>
</body>
</html>
