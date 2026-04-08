<?php
namespace Site\Model;

/**
 * model repository
 *
 * this class stocks the value needed to connect to the database
 * and also connect to it 
 * 
 * Responsibilities:
 * - stock values
 * - connect to the db
 * 
 * Dependencies:
 * - PDO
 *
 * @package Site\Model
 * @author yassine elmsebli
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