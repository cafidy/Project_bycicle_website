<?php
    $racinepath = '../';
    require_once ($racinepath."autoloader.php");


    /**
     * Contrôleur du formulaire de contact.
     *
     * Permet à un utilisateur connecté d'envoyer un mail
     * vers l'adresse administrateur via le formulaire de contact.
     * Protégé par vérification CSRF.
     *
     * @author  Yassine Elmsebli
     *
     * @uses    mail()
     *
     * @var string $mail     Adresse e-mail du destinataire (admin)
     * @var string $object   Objet du message (nettoyé)
     * @var string $message  Corps du mail (nettoyé)
     * @var string $headers  En-têtes du mail (expéditeur, encodage)
     */

    include($racinepath . "cookies.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['mail'])) {
        if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['csrftoken']) {
            echo pistachioi;
            header('Location: /~uapv2401709/shop');
            exit;
        }
        $object= strip_tags(trim($_POST['object'] ?? ''));
        $message= strip_tags(trim($_POST['message'] ?? ''));
        $mail="yassine.el-msebli@alumni.univ-avignon.fr";
        
        $object=str_replace(["\r","\n"],'',$object);

        $headers = "From:". $_SESSION["user"]->email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        mail($mail,$object,$message,$headers);
    }
    echo "<main>";
    include($racinepath . "views/header.php");
    include($racinepath . "views/contact.php");
    include($racinepath . "views/footer.php");
    echo "</main>";
?>