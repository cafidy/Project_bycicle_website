<?php
namespace Site\Entity;
require_once __DIR__ .'/../interface/IUser.php';

/**
 * Fait le lien entre les piece d'une commande et la commande elle meme
 *
 * @package    Site\Entity
 * @author     yassine el msebli
 *
 * @property   int      $userid      Identifiant utilisateur  
 * @property   string   $name        nom de l'utilisateur
 * @property   string   $email       address dmail de l'utilisateur
 * @property   string   $phone       telephone de l'utilisateur
 */

class User implements IUser{
    public $userid;
    public $name;
    public $email;
    public $phone;
    /**
     * Initialise l'utilisateur avec les informations fournie
     */
    public function __construct($userid, $name, $email, $phone) {
        $this->userid = $userid;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
}
?>