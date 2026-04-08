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

$parts= new PartsDB();
$orders = new OrderDB();
$allparts = $parts->getallparts();
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addcart'])){
    $orders->addpartorder(2,$_POST['partid']);
}
$racinepath="../";
include "../views/header.php";
include "../views/shop.php";
include "../views/footer.php";
?>