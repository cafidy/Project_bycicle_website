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
 * - OrderDB
 * - Order
 *
 * @author yassine elmsebli
 */

use Site\Model\OrderDB;
use Site\Entity\Order;
use Site\Model\PartsDB;

include "../cookies.php";

$racinepath = "../";
$retriever = new OrderDB();
$retrievepart = new PartsDB();

$orders = null;
$cart = [];

if (isset($_SESSION['user'])) {

    $orders = new Order(
        $_SESSION['user'],
        $retriever->getactualorder($_SESSION['user']->userid),
        $retriever->getpreviousorder($_SESSION['user']->userid)
    );

} else {

    if (isset($_COOKIE['basket'])) {

        $cart = json_decode($_COOKIE['basket'], true);
        $parts = [];

        foreach ($cart as $part) {

            $parts[] = $retrievepart->getpart($part);
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['takeoff'])) {
        if (isset($_SESSION['user'])) {
            $retriever->removepartorder($_POST['odrpart']);
        } else {

            $newCart = [];

            foreach ($cart as $value) {
                if ($value != $_POST['partid']) {
                    $newCart[] = $value;
                }
            }
            $cart = $newCart;
            setcookie("basket", json_encode($cart), time() + 3600 * 24 * 7, "/");
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    if (isset($_POST['orderpart'])) {

        $retriever->orderpassed(
            $_SESSION['user']->userid,
            $orders->getAcorder()[0]->orderid
        );
    }
}

if (isset($_SESSION['user'])) {

    $orders->setAcorder($retriever->getactualorder(2));
}

include "../views/header.php";
include "../views/basket.php";
include "../views/footer.php";
?>