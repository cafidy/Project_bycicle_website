<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");
    /**
     * Contrôleur du panier de l'utilisateur.
     *
     * Affiche les articles du panier, permet de les supprimer
     * et de passer la commande. Gère deux cas : utilisateur
     * connecté (via session) ou anonyme (via cookie).
     *
     * @author  Yassine Elmsebli
     *
     * @uses    OrderDB::getactualorder()
     * @uses    OrderDB::getpreviousorder()
     * @uses    OrderDB::removepartorder()
     * @uses    OrderDB::orderpassed()
     * @uses    PartsDB::getpart()
     *
     * @var OrderDB   $retriever      Accès aux données commandes
     * @var PartsDB   $retrievepart   Accès aux données des pièces
     * @var Order     $orders         Commande courante + historique
     * @var array     $cart           Panier anonyme (cookie)
     * @var string    $message        Message de confirmation
     */

    use Site\Model\OrderDB;
    use Site\Entity\Order;
    use Site\Model\PartsDB;
    include ($racinepath."cookies.php");

    
    $retriever = new OrderDB();
    $retrievepart = new PartsDB();

    $message = "";
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

        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            header('Location: /~uapv2401709/basket');
            exit;
        }
        if (isset($_POST['takeoff'])) {
            if (isset($_SESSION['user'])) {
                $retriever->removepartorder($_POST['odrpart']);
            } else {

                array_splice($cart,$_POST['index'],1);
                setcookie("basket", json_encode($cart), time() + 3600 * 24 * 7, "/");
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit;
            }
        }

        if (isset($_POST['orderpart'])) {

            $retriever->orderpassed(
                $orders->getAcorder()[0]->orderid,
                $_SESSION['user']->userid
            );
            $message ="Order Passed";
        }
    }

    if (isset($_SESSION['user'])) {

        $orders->setAcorder($retriever->getactualorder($_SESSION['user']->userid));
    }

    include ($racinepath."views/header.php");
    include ($racinepath."views/basket.php");
    include ($racinepath."views/footer.php");
?>