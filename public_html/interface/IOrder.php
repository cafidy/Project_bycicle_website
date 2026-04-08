<?php
namespace Site\Entity;

interface IOrder {
    public function __construct(User $user, array $acorder, array $prorder);
    public function getUser();
    public function getAcorder();
    public function getProrder();
    public function setAcorder(array $acorder);
    public function setProrder(array $prorder);
}
?>