<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie_action'])) {
    if (isset($_POST['accept_cookies'])) {
        setcookie("consent", "true", time() + 3600 , "/");
        if (isset($_POST['choix1'])) {
            setcookie("choix1", "true", time() + 3600 , "/");
        } else {
            setcookie("choix1", "false", time() + 3600 , "/");
        }
        if (isset($_POST['choix2'])) {
            setcookie("choix2", "true", time() + 3600 , "/");
        } else {
            setcookie("choix2", "false", time() + 3600 , "/");
        }
    }
    if (isset($_POST['refuse_cookies'])) {
        setcookie("consent", "false", time() + 3600 , "/");
        setcookie("choix1", "false", time() + 3600 , "/");
        setcookie("choix2", "false", time() + 3600 , "/");
    }
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
}
?>