<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * let you see user info
 * 
 * Responsibilities:
 * - show user account and let you update it 
 * 
 * Dependencies:
 * - UserDB
 * - OrderDB
 * - User
 * - Order
 *
 * @author yassine elmsebli
 */

use Site\Model\UsersDB;
use Site\Model\OrderDB;
use Site\Entity\User;
use Site\Entity\Order;

$racinepath='../';

$users= new UsersDB();
if($_SERVER["REQUEST_METHOD"]=== "POST" && isset($_POST['update'])){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){
        $users->updateuser($_SESSION["user"]->userid,$_POST['name'],$_POST['email'],$_POST['phone']);
    }
}

$ordertv = new OrderDB();
$orders = new Order($_SESSION["user"],$ordertv->getactualorder($_SESSION["user"]->userid),$ordertv->getpreviousorder($_SESSION["user"]->userid));

include "../views/header.php";
include "../views/account.php";
include "../views/footer.php";
?>