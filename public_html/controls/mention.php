<?php
    $racinepath="../";
    require_once ($racinepath."autoloader.php");
    
    /**
     * Contrôleur de la page des mentions légales.
     *
     * Affiche la page des mentions légales
     *
     * @author  Yassine Elmsebli
     *
     */
    
    include ($racinepath."cookies.php");
    
    include ($racinepath."views/header.php");
    include ($racinepath."views/mention.php");
    include ($racinepath."views/footer.php");

?>