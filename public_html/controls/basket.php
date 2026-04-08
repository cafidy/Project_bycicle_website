<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * see the basket , pass the command , delete item from the basket
 * 
 * Responsibilities:
 * - show basket
 * - pass order
 * - delete item from basket 
 * 
 * Dependencies:
 * - UserDB
 * - OrderDB
 * - Order
 *
 * @author yassine elmsebli
 */

use Site\Model\OrderDB;
use Site\Model\UsersDB;
use Site\Entity\Order;

$racinepath="../";
$retriever= new OrderDB();
$useretiver = new UsersDB();
$user = $useretiver->getuser(2);
$orders = new Order($user,$retriever->getactualorder(2),$retriever->getpreviousorder(2));
if($_SERVER["REQUEST_METHOD"]=== "POST" ){
    if(isset($_POST['takeoff'])){
        $retriever->removepartorder($_POST['odrpart']);
    }
    if(isset($_POST['orderpart'])){
        $retriever->orderpassed($user->userid,$orders->getAcorder()[0]->orderid); 
    }
}
$orders->setAcorder($retriever->getactualorder(2));
include "../views/header.php";
include "../views/basket.php";
include "../views/footer.php";
?>