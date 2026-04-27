<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");
    /**
     * Contrôleur de la page compte utilisateur.
     *
     * Affiche les informations du compte connecté et permet
     * leur mise à jour via un formulaire sécurisé (CSRF).
     * Redirige vers /login si aucune session active.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    UsersDB::updateuser()
     * @uses    OrderDB::getactualorder()
     * @uses    OrderDB::getpreviousorder()
     *
     * @var UsersDB $users    Accès aux données utilisateur
     * @var OrderDB $ordertv  Accès aux données commandes
     * @var Order   $orders   Commande courante + historique
     */

    use Site\Model\UsersDB;
    use Site\Model\OrderDB;
    use Site\Entity\Order;
    include ($racinepath."cookies.php");

    

    $users= new UsersDB();
    if (!isset($_SESSION['user'])) {
        header('Location: /~uapv2401709/login');
        exit;
    }
    if($_SERVER["REQUEST_METHOD"]=== "POST" && isset($_POST['update'])){
        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            header('Location: /~uapv2401709/account');
            exit;
        }
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])){
            $users->updateuser($_SESSION["user"]->userid,$_POST['name'],$_POST['email'],$_POST['phone']);
        }
    }

    $ordertv = new OrderDB();
    $orders = new Order($_SESSION["user"],$ordertv->getactualorder($_SESSION["user"]->userid),$ordertv->getpreviousorder($_SESSION["user"]->userid));

    include ($racinepath."views/header.php");
    include ($racinepath."views/account.php");
    include ($racinepath."views/footer.php");
?>