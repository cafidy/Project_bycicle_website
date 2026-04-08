<?php
namespace Site\Entity;

interface IPart {
    public function __construct($id, $name, $price, $stock, $desc, $img);
}
?>