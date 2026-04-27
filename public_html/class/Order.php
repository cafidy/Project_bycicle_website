<?php

namespace Site\Entity;

require_once 'User.php';
require_once 'OrderPart.php';
require_once '../interface/IOrder.php';



/**
 * Commande d'un utilisateur donné
 *
 * Permet de stocker toute les piece des commandes en cour ou passer d'un utilisateur
 *
 * @package    Site\Entity
 * @author     yassine el msebli
 *
 * @property   User         $user        Utilisateur associé a la commande
 * @property   Orderpart[]    $acorder     Liste des piece associer a la commande actuel 
 * @property   Orderpart[]    $prorder     Liste des piece associer aux commande précédente
 */

class Order implements IOrder{
    private $user;
    private $acorder = []; 
    private $prorder = [];

    /**
     * Initialise les commandes d'un utilisateur.
     */
    public function __construct(User $user, array $acorder = [], array $prorder = []) {
        $this->user = $user;
        $this->acorder = $acorder;
        $this->prorder = $prorder;
    }

    // — Getters ------------------------------------------------

    public function getUser() {
        return $this->user;
    }

    public function getAcorder() {
        return $this->acorder;
    }

    public function getProrder() {
        return $this->prorder;
    }

    // — Setters ------------------------------------------------

    public function setAcorder(array $acorder) {
        $this->acorder = $acorder;
    }

    public function setProrder(array $prorder) {
        $this->prorder = $prorder;
    }

}

?>