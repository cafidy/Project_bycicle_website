<?php
namespace Site\Entity;

interface IOrderPart {
    public function __construct($orderid, $id, $iduser, Part $part, $date);
}
?>