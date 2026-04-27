<?php
namespace Site\Model;

/**
 * Classe de connexion à la base de données.
 *
 * Initialise et expose la connexion PDO PostgreSQL.
 * Étendue par tous les modèles du projet.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 *
 * @property PDO $con  Instance de connexion PDO
 */

use PDO;
use PDOException;
use Site\Catchers\DBException;

class ConnectDB {
    private $servername = "localhost";
    private $dbname = "etd";
    private $username = "uapv2401709";
    private $password = "yassine20";
    
    public function __construct() {
        try {
            $this->con = new PDO("pgsql:host=localhost;dbname=etd", "uapv2401709", "yassine20");
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new DBException("Error connection failed");
        }
    }
}
?>