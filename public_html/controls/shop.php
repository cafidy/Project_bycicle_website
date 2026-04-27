<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");

    /**
     * Contrôleur de la page du shop.
     *
     * Affiche toutes les pièces disponibles.
     * Permet l'ajout au panier via session si connecté
     * ou via cookie si anonyme.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    PartsDB::getallparts()
     * @uses    OrderDB::addpartorder()
     *
     * @var PartsDB  $parts     Accès aux données des pièces
     * @var OrderDB  $orders    Accès aux données commandes
     * @var array    $allparts  Liste de toutes les pièces du shop
     * @var array    $cart      Panier anonyme (cookie)
     */

    use Site\Model\PartsDB;
    use Site\Model\OrderDB;
    include ($racinepath."cookies.php");

    $parts= new PartsDB();
    $orders = new OrderDB();
    $allparts = $parts->getallparts();
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addcart'])){
        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            header('Location: /~uapv2401709/shop');
            exit;
        }
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

    include ($racinepath."views/header.php");
    include ($racinepath."views/shop.php");
    include ($racinepath."views/footer.php");
?>