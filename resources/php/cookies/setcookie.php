<?php
    if(isset($_GET['language'])){
        setcookie('language', $_POST['language'], (time()+86400*30), "/", "nutro.local");
    }
    if(isset($_GET['theme'])){
        setcookie('theme', $_POST['theme'], (time()+86400*30), "/", "nutro.local");
    }