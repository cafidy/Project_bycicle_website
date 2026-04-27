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
    public function getUser(): User;
    /** @inheritDoc */
    public function getAcorder(): array;
    /** @inheritDoc */
    public function getProrder(): array;
    /** @inheritDoc */
    public function setAcorder(array $acorder): void;
    /** @inheritDoc */
    public function setProrder(array $prorder): void;
}
?>