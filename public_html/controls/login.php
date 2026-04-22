<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * let you login with verification
 * 
 * Responsibilities:
 * - log user
 * - verify info
 * 
 * Dependencies:
 * - UserDB
 *
 * @author yassine elmsebli
 */

use Site\Model\UsersDB;
include "../cookies.php";

$users = new UsersDB();
$message = "";
$racinepath = '../';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $actuser = $users->checklogin($_POST['email'], $_POST['password']);
    if (!empty($actuser)) {
        $_SESSION['user']=$actuser;
        header('Location: /~uapv2401709/account');
        exit();
    } else {
        $message = "Error: login or password incorrect";
        include "../views/header.php";
        include "../views/login.php";
        include "../views/footer.php";
    }
} else {
    if (isset($_POST['disconect'])) {
        session_destroy();
        header('Location: /~uapv2401709/login');
        exit();
    }
    include "../views/header.php";
    include "../views/login.php";
    include "../views/footer.php";
}
?>