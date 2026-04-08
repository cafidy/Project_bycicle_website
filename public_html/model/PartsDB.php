<?php
namespace Site\Model;

/**
 * model repository
 *
 * gets parts on in the db adn send them
 * 
 * Responsibilities:
 * - get values
 * 
 * Dependencies:
 * - PDO
 * - Part
 *
 * @package Site\Model
 * @author yassine elmsebli
 */

use PDO;
use Site\Entity\Part;

class PartsDB extends DB {
    public function getallparts() {
        $stmt = $this->db->prepare("SELECT * FROM parts");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        $parts = [];
        foreach ($rows as $row) {
            $parts[] = new Part(
                $row['partid'],
                $row['namepart'],
                $row['price'],
                $row['stock'],
                $row['descr'],
                $row['img']
            );
        }
        return $parts;
    }

    public function getpart($idpart){
        $stmt = $this->db->prepare("SELECT * FROM parts WHERE partid = :idpart");
        $stmt->execute([':idpart' => $idpart]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);  
        $part = new Part(
            $row['partid'],
            $row['namepart'],
            $row['price'],
            $row['stock'],
            $row['descr'],
            $row['img']
        );
        return $part;
    }
}
?>