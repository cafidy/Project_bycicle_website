<?php
namespace Site\Entity;

/**
 * Interface de la classe OrderPart.
 *
 * @package  Site\Entity
 * @author   Yassine Elmsebli
 */
interface IOrderPart
{
    /** @inheritDoc */
    public function __construct($orderid, $id, $iduser, Part $part, $date);
}
?>