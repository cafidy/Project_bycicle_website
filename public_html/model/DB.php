<?php
namespace Site\Model;
/**
 * model repository
 *
 * this class stocks the connection itself
 * 
 * Responsibilities:
 * - stock connection
 * 
 * Dependencies:
 * - ConnectDB
 *
 * @package Site\Model
 * @author yassine elmsebli
 */

class DB {
    protected $db;
    public function __construct() {
        $this->db = (new ConnectDB())->con;
    }
}
?>