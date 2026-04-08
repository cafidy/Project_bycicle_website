<?php
namespace Site\Entity;
require_once '../interface/IUser.php';

class User implements IUser{
    public $userid;
    public $name;
    public $email;
    public $phone;

    public function __construct($userid, $name, $email, $phone) {
        $this->userid = $userid;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
}
?>