<?php

namespace Site\Entity;

require_once 'User.php';
require_once 'OrderPart.php';
require_once '../interface/IOrder.php';

class Order implements IOrder{
    private $user;
    private $acorder = []; 
    private $prorder = [];

    public function __construct(User $user, array $acorder = [], array $prorder = []) {
        $this->user = $user;
        $this->acorder = $acorder;
        $this->prorder = $prorder;
    }

    public function getUser() {
        return $this->user;
    }

    public function getAcorder() {
        return $this->acorder;
    }

    public function getProrder() {
        return $this->prorder;
    }

    public function setAcorder(array $acorder) {
        $this->acorder = $acorder;
    }

    public function setProrder(array $prorder) {
        $this->prorder = $prorder;
    }

}

?>