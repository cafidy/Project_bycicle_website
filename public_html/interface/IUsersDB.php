<?php
namespace Site\Model;

interface IUsersDB {
    public function checklogin($adrmail, $password);
    public function getuser($iduser);
    public function updateuser($userid, $name, $email, $phone);
    public function createuser($name, $email, $phone, $password);
    public function deleteuser($id);
}
?>