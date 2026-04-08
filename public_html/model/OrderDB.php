<?php
namespace Site\Model;

/**
 * model repository
 *
 * this class takes care of retrieving and adding orders
 * and orderpart to the database 
 * 
 * Responsibilities:
 * - get values
 * - create new ones
 * - update tables
 * 
 * Dependencies:
 * - OrderPart
 * - Part
 * - NotexistException
 * - PDO
 *
 * @package Site\Model
 * @author yassine elmsebli
 */

use PDO;
use Site\Entity\Part;
use Site\Entity\OrderPart;
use Site\Catchers\NotexistException;

class OrderDB extends DB {
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

    public function addpartorder($userid, $idpart){
        $stmt = $this->db->prepare('SELECT orderid FROM orders WHERE completed = false AND userid = :userid LIMIT 1');
        $stmt->execute([':userid' => $userid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $orderid = $row['orderid'];
        $stmt = $this->db->prepare('INSERT INTO orderpart (orderid, partid) VALUES (:orderid, :partid)');
        $stmt->execute([':orderid' => $orderid, ':partid' => $idpart]);
    }

    public function removepartorder($idodrpart){
    $stmt = $this->db->prepare('DELETE FROM orderpart WHERE id = :id');
    $stmt->execute([':id' => $idodrpart]);
    if ($stmt->rowCount() === 0) {
        throw new NotexistException("OrderPart with ID $idodrpart do not exist");
    }
}

    public function orderpassed($orderid,$userid){
        $stmt = $this->db->prepare('UPDATE orders SET datec = :datea, completed = true WHERE orderid = :orderid');
        $stmt->execute([':datea' => date("Y-m-d"), ':orderid' => $orderid]);
        $stmt = $this->db->prepare('INSERT INTO orders (userid,completed)   VALUES ( :userid,false)');
        $stmt->execute([':userid'=>$userid]);
    }

    public function createorder($userid){
        $stmt = $this->db->prepare("INSERT INTO order (userid,completed) VALUES ( :userid,false)");
        $stmt->execute([':userid'=>$userid]);
    }
}
?>