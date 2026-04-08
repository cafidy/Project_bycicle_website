<?php
    //affichage des utilisateur enregistrés dans la base de donnée , avec capacite de supprimer ou de contacter
    $racinepath="../";
    include "../views/header.php";
    echo '<div class="container">';
    echo '<div class="row ">';
    include "../views/menu.php";
    include "../views/users.php";
    echo '</div>';
    echo '</div>';
    include "../views/footer.php";

?>