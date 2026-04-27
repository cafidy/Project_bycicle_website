<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");

    /**
     * Contrôleur de la page d'une pièce.
     *
     * Affiche les informations détaillées d'une pièce sélectionnée.
     * Permet de l'ajouter au panier, via la session si connecté
     * ou via cookie si anonyme.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    PartsDB::getpart()
     * @uses    OrderDB::addpartorder()
     *
     * @var PartsDB  $parts   Accès aux données des pièces
     * @var OrderDB  $orders  Accès aux données commandes
     * @var Part     $part    Pièce sélectionnée à afficher
     * @var array    $cart    Panier anonyme (cookie)
     */

    use Site\Model\PartsDB;
    use Site\Model\OrderDB;
    include ($racinepath."cookies.php");

    $part = null;
    $parts = new PartsDB();
    $orders = new OrderDB();
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
            $cart[] = $partid;
            setcookie("basket", json_encode($cart), time() + 3600 , "/");
        }
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['partid'])) {
        $part = $parts->getpart($_POST['partid']);
    }

    include ($racinepath."views/header.php");
    include ($racinepath."views/item.php");
    include ($racinepath."views/footer.php");
?>