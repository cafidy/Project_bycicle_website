<?php
namespace Site\Entity;

require_once '../class/Part.php';
require_once '../interface/IOrderPart.php';

class OrderPart implements IOrderPart{
    public $orderid;
    public $id;
    public $iduser;
    public $part;
    public $date;

    public function __construct($orderid,$id, $iduser, Part $part, $date) {
        $this->orderid=$orderid;
        $this->id = $id;         
        $this->iduser = $iduser;
        $this->part = $part;
        $this->date = $date;
    }
}
?>
