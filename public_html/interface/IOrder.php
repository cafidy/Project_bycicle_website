<?php
namespace Site\Entity;

/**
 * Interface de la classe Order.
 *
 * @package  Site\Entity
 * @author   Yassine Elmsebli
 */
interface IOrder
{
    /** @inheritDoc */
    public function __construct(User $user, array $acorder, array $prorder);
    /** @inheritDoc */
    public function getuser();
    /** @inheritDoc */
    public function getAcorder();
    /** @inheritDoc */
    public function getProrder();
    /** @inheritDoc */
    public function setAcorder(array $acorder);
    /** @inheritDoc */
    public function setProrder(array $prorder);
}
?>