<?php
namespace Site\Model;


/**
 * Accès aux données des commandes.
 *
 * Fournit les opérations de lecture et d'écriture
 * sur les tables Orders et Orderpart.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */

use PDO;
use Site\Entity\Part;
use Site\Entity\OrderPart;
use Site\Catchers\NotexistException;

class OrderDB extends DB {

    /**
     * Recherche la commande en cours pour un utilisateur donnee 
     * et la renvoie sous form de liste d'OrderPart.
     *
     * @param  int         $iduser          Identifiant de l'utilisateur 
     *
     * @return OrderPart[]  Liste des OrderPart(piece) faisant partie de la commande actuel          
     *
     */
    public function getactualorder($iduser) {
        $stmt = $this->db->prepare('SELECT p.*, o.datec,op.id, o.orderid FROM Parts p JOIN Orderpart op ON p.partid = op.partid JOIN Orders o ON op.orderid = o.orderid WHERE o.userid = :iduser AND o.completed = false');
        $stmt->execute([':iduser' => $iduser]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $orderParts = [];
        foreach ($rows as $row) {
            $part = new Part(
                $row['partid'],
                $row['namepart'],
                $row['price'],
                $row['stock'],
                $row['descr'],
                $row['img']
            );
            $orderParts[] = new OrderPart(
                $row['orderid'],
                $row['id'], 
                $iduser,
                $part,
                $row['datec']
            );
        }
        return $orderParts;
    }

    /**
     * Recherche les commandes précédente pour un utilisateur donnee 
     * et la renvoie sous form de liste d'OrderPart.
     *
     * @param  int         $iduser          Identifiant de l'utilisateur 
     *
     * @return OrderPart[]  Liste des OrderPart(piece) faisant partie des commandes précédentes         
     *
     */
    public function getpreviousorder($iduser){
        $stmt = $this->db->prepare('SELECT p.*, op.id ,o.datec,o.orderid FROM Parts p JOIN Orderpart op ON p.partid = op.partid JOIN Orders o ON op.orderid = o.orderid WHERE o.userid = :iduser AND o.completed = true');
        $stmt->execute([':iduser' => $iduser]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $orderParts = [];
        foreach ($rows as $row) {
            $part = new Part(
                $row['partid'],
                $row['namepart'],
                $row['price'],
                $row['stock'],
                $row['descr'],
                $row['img']
            );
            $orderParts[] = new OrderPart(
                $row['orderid'],
                $row['id'],
                $iduser,
                $part,
                $row['datec']
            );
        }
        return $orderParts;
    }

    /**
     * Ajout d'une pièce a la commande en cour d'un utilisateur donnée
     *
     * @param  int         $userid          Identifiant de l'utilisateur 
     * @param  int         $idpart          Identifiant de la piece a ajouter 
     *
     */
    public function addpartorder($userid, $idpart){
        $stmt = $this->db->prepare('SELECT orderid FROM orders WHERE completed = false AND userid = :userid LIMIT 1');
        $stmt->execute([':userid' => $userid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $orderid = $row['orderid'];
        $stmt = $this->db->prepare('INSERT INTO orderpart (orderid, partid) VALUES (:orderid, :partid)');
        $stmt->execute([':orderid' => $orderid, ':partid' => $idpart]);
    }

    /**
     * Retire une piece d'une commande donnée
     *
     * @param  int         $idodrpart          Identifiant de la pièce reliés a la commande    
     *
     * @throws NotexistException  Si la pièce n'existe pas en base
     * 
     */
    public function removepartorder($idodrpart){
        $stmt = $this->db->prepare('DELETE FROM orderpart WHERE id = :id');
        $stmt->execute([':id' => $idodrpart]);
        if ($stmt->rowCount() === 0) {
            throw new NotexistException("OrderPart with ID $idodrpart do not exist");
        }
    }

    /**
     * Convertie une commande en cours en commande passer
     *
     * @param  int         $userid         Identifiant de l'utilisateur 
     * @param  int         $orderid        Identifiant de la commande a passer
     */
    public function orderpassed($orderid,$userid){
        $stmt = $this->db->prepare('UPDATE orders SET datec = :datea, completed = true WHERE orderid = :orderid AND userid = :userid');
        $stmt->execute([':datea' => date("Y-m-d"), ':orderid' => $orderid , ':userid'=>$userid]);
        $stmt = $this->db->prepare('INSERT INTO orders (userid,completed)   VALUES ( :userid,false)');
        $stmt->execute([':userid'=>$userid]);
    }

    /**
     * Cree une commande en cour pour un utilisateur donnee
     *
     * @param  int         $iduser          Identifiant de l'utilisateur 
     *
     */
    public function createorder($userid){
        $stmt = $this->db->prepare("INSERT INTO orders (userid,completed) VALUES ( :userid,false)");
        $stmt->execute([':userid'=>$userid]);
    }
}
?>