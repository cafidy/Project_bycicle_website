<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");
    
    /**
     * Contrôleur de la page de connexion.
     *
     * Gère l'authentification de l'utilisateur et la déconnexion.
     * À la connexion, transfère le panier cookie vers la session
     * puis redirige vers le compte. Affiche un message d'erreur
     * si les identifiants sont incorrects.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    UsersDB::checklogin()
     * @uses    OrderDB::addpartorder()
     *
     * @var UsersDB $users    Accès aux données utilisateur
     * @var OrderDB $orders   Accès aux données commandes
     * @var string  $message  Message d'erreur affiché à l'utilisateur
     * @var int[]   $carts    Identifiant des pieces etant dans le panier cookie
     */

    use Site\Model\UsersDB;
    use Site\Model\OrderDB;
    include ($racinepath."cookies.php");

    $users = new UsersDB();
    $orders = new OrderDB();
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            header('Location: /~uapv2401709/login');
            exit;
        }
        $actuser = $users->checklogin($_POST['email'], $_POST['password']);
        if (!empty($actuser)) {
            $_SESSION['user']=$actuser;
            if(isset($_COOKIE['basket'])){
                $carts = json_decode($_COOKIE['basket'], true);
                foreach ($carts as $cart){
                    $orders->addpartorder($actuser->userid,$cart);
                }
                setcookie("basket", "", time() - 3600, "/");
            }
            header('Location: /~uapv2401709/account');
            exit();
        } else {
            $message = "Error: login or password incorrect";
            include ($racinepath."views/header.php");
            include ($racinepath."views/login.php");
            include ($racinepath."views/footer.php");
        }
    } else {
        if (isset($_POST['disconect'])) {
            session_destroy();
            header('Location: /~uapv2401709/login');
            exit();
        }
        include ($racinepath."views/header.php");
        include ($racinepath."views/login.php");
        include ($racinepath."views/footer.php");
    }
?>