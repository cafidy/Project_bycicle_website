<?php
namespace Site\Entity;
require_once '../interface/IPart.php';

/**
 * Stockage des pieces en vente sur le site pour l'affichage ou les commandes
 * 
 * @package    Site\Entity
 * @author     yassine el msebli
 *
 * @property   int          $partid         Identifiant de la piece    
 * @property   string       $name           Nom de la piece(ex:groupe simano)
 * @property   float        $price          Prix de la piece 
 * @property   int          $stock          Stock actuel
 * @property   string       $desc           Description de la piece 
 * @property   string       $img            Nom de l'image relie a la piece
 */


class Part implements IPart{
    public $partid;
    public $name;
    public $price;
    public $stock;
    public $desc;
    public $img;

    /**
     * Initialise une piece donnee avec les valeurs fournie
     */

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