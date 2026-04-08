<?php
namespace Site\Entity;
require_once '../interface/IPart.php';

class Part implements IPart{
    public $partid;
    public $name;
    public $price;
    public $stock;
    public $desc;
    public $img;

    public function __construct($id,$name,$price,$stock,$desc,$img){
        $this->partid=$id;
        $this->name=$name;
        $this->price=$price;
        $this->stock=$stock;
        $this->desc=$desc;
        $this->img=$img;
    }
}

?>