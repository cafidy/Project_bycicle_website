<?php
namespace Site\Entity;

require_once '../class/Part.php';
require_once '../interface/IOrderPart.php';

/**
 * Fait le lien entre les piece d'une commande et la commande elle meme
 *
 * @package    Site\Entity
 * @author     yassine el msebli
 *
 * @property   int         $orderid      Commande liée a la piece 
 * @property   int         $id           Identifiant de l'OrderPart dans la BDD
 * @property   int         $iduser       Utilisateur reliée a la commande
 * @property   Part        $part         Piece Liée a la commande
 * @property   Date        $date         date de passage de la commande si faite
 */




class OrderPart implements IOrderPart{
    public $orderid;
    public $id;
    public $iduser;
    public $part;
    public $date;

    /**
     * Initialise le lien entre une piece et la commande donnée
     *
     */

    public function __construct($orderid,$id, $iduser, Part $part, $date) {
        $this->orderid=$orderid;
        $this->id = $id;         
        $this->iduser = $iduser;
        $this->part = $part;
        $this->date = $date;
    }
}
?>
