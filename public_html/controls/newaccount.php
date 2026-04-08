<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * let you create an account with your infos
 * 
 * Responsibilities:
 * - create new account
 * - verify if not exist
 * 
 * Dependencies:
 * - UserDBs
 *
 * @author yassine elmsebli
 */

use Site\Model\UsersDB;

$users = new UsersDB();
$message = "";
$racinepath = '../';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['create'])) {
    if ($users->createuser($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['password'])) {
        include "account.php";
    } else {
        $message = "Error: Email already used";
        include "../views/header.php";
        include "../views/newaccount.php";
        include "../views/footer.php";
    }
} else {
    include "../views/header.php";
    include "../views/newaccount.php";
    include "../views/footer.php";
}
?>