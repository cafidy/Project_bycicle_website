<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * get the wanted part and show mor developped info 
 * 
 * Responsibilities:
 * - more info about part
 * 
 * Dependencies:
 * - PartDB
 * - Part
 *
 * @author yassine elmsebli
 */

use Site\Model\PartsDB;
use Site\Model\OrderDB;
include "../cookies.php";
$racinepath = "../";
$part = null;
$parts = new PartsDB();
$orders = new OrderDB();
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addcart'])){
    if(isset($_SESSION['user'])){
        $orders->addpartorder($_SESSION['user']->userid,$_POST['partid']);
    }
    else {
        $cart = [];
        if (isset($_COOKIE['basket'])) {
            $cart = json_decode($_COOKIE['basket'], true);
        }
        $cart[] = $partid;
        setcookie("basket", json_encode($cart), time() + 3600 , "/");
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['partid'])) {
    $part = $parts->getpart($_POST['partid']);
}

include "../views/header.php";
include "../views/item.php";
include "../views/footer.php";
?>