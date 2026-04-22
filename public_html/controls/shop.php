<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * show the parts for sell and add them to the basket if wanted
 * 
 * Responsibilities:
 * - add part to orders
 * - show parts for sale 
 * 
 * Dependencies:
 * - PartDB
 * - OrderDB
 *
 * @author yassine elmsebli
 */

use Site\Model\PartsDB;
use Site\Model\OrderDB;
include "../cookies.php";

$parts= new PartsDB();
$orders = new OrderDB();
$allparts = $parts->getallparts();
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addcart'])){
    if(isset($_SESSION['user'])){
        $orders->addpartorder($_SESSION['user']->userid,$_POST['partid']);
    }
    else {
        $cart = [];
        if (isset($_COOKIE['basket'])) {
            $cart = json_decode($_COOKIE['basket'], true);
        }
        $cart[] = $_POST['partid'];
        setcookie("basket", json_encode($cart), time() + 3600 , "/");
    }
}
$racinepath="../";
include "../views/header.php";
include "../views/shop.php";
include "../views/footer.php";
?>