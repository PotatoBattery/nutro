<?php
    include '../db.php';
    /** @var  $db_link */
    @mysqli_query($db_link, "DELETE FROM auth_users WHERE user_id = ".intval($_COOKIE['userID']));
    setcookie('userID', '', (time()-3600), "/", "nutro.local");
    setcookie('userHash', '', (time()-3600), "/", "nutro.local");