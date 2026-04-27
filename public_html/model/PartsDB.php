<?php
namespace Site\Model;

/**
 * Accès aux données des pieces.
 *
 * Fournit les opérations de lecture et d'écriture
 * sur la table Parts.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */

use PDO;
use Site\Entity\Part;

class PartsDB extends DB {
    /**
     * Recherche et renvoie toute les pièces actuellement stockés dans la BDD.
     *
     *
     * @return Part[]  Liste de toutes les pièces actuellement stockés          
     *
     */
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

    /**
     * Recherche et renvoie une piece celon son id
     *
     * @param  int         $idpart         Identifiant de la piece 
     *
     * @return Part  Pièce renvoyer celon l'identifiant
     *
     */
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