<?php
if (isset($_COOKIE['cookieCheck'])) {
    echo 'true';
} else {
    if (isset($_GET['reload'])) {
        echo 'false';
    } else {
        setcookie('cookieCheck', '1', time() + 60);
        header('Location: ' . $_SERVER['PHP_SELF'] . '?reload');
        exit();
    }
}