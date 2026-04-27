<?php
namespace Site\Model;

/**
 * Classe de base pour tous les modèles.
 *
 * Récupère et expose la connexion PDO via ConnectDB.
 * Étendue par tous les modèles du projet.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 *
 * @property PDO $db  Instance de connexion PDO
 */

class DB {
    protected $db;
    public function __construct() {
        $this->db = (new ConnectDB())->con;
    }
}
?>