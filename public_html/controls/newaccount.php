<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");
    /**
     * Contrôleur de la page de création de compte.
     *
     * Gère la création de nouveaux utilisateurs.
     * À la création, transfère le panier cookie vers la session
     * puis redirige vers le compte. Affiche un message d'erreur
     * si l'email est déjà utilisé.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    UsersDB::createuser()
     * @uses    UsersDB::getusermail()
     * @uses    OrderDB::createorder()
     * @uses    OrderDB::addpartorder()
     *
     * @var UsersDB $users    Accès aux données utilisateur
     * @var OrderDB $orders   Accès aux données commandes
     * @var string  $message  Message d'erreur affiché à l'utilisateur
     * @var array   $carts    Identifiants des pièces dans le panier cookie
     */

    use Site\Model\UsersDB;
    use Site\Model\OrderDB;

    include ($racinepath."cookies.php");

    $users = new UsersDB();
    $orders =  new OrderDB();
    $message = "";
    $racinepath = '../';
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['create'])) {
        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            header('Location: /~uapv2401709/newaccount');
            exit;
        }
        if ($users->createuser($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['password'])) {
            $_SESSION['user']=$users->getusermail($_POST['email']);
            $orders->createorder($_SESSION['user']->userid);
            if(isset($_COOKIE['basket'])){
                $carts = json_decode($_COOKIE['basket'], true);
                foreach ($carts as $cart){
                    $orders->addpartorder($_SESSION['user']->userid,$cart);
                }
                setcookie("basket", "", time() - 3600, "/");
            }
            header('Location: /~uapv2401709/account');
            exit;
        } else {
            $message = "Error: Email already used";
            include ($racinepath."views/header.php");
            include ($racinepath."views/newaccount.php");
            include ($racinepath."views/footer.php");
        }
    } else {
        include ($racinepath."views/header.php");
        include ($racinepath."views/newaccount.php");
        include ($racinepath."views/footer.php");
    }
?>