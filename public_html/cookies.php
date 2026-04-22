<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie_action'])) {

    if (isset($_POST['accept_cookies'])) {

        setcookie("consent", "true", time() + 3600 , "/");

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }

    elseif (isset($_POST['refuse_cookies'])) {

        setcookie("consent", "false", time() + 3600, "/");

        header("Location: " . $_SERVER['REQUEST_URI']);
        exit;
    }
}
?>