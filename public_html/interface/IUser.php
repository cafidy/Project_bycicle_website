<?php
namespace Site\Entity;

interface IUser {
    public function __construct($userid, $name, $email, $phone);
}
?>