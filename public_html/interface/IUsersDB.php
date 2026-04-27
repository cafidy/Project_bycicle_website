<?php
namespace Site\Model;

/**
 * Interface de la classe UsersDB.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */
interface IUsersDB
{
    /** @inheritDoc */
    public function checklogin($adrmail, $password);
    /** @inheritDoc */
    public function getuser($iduser);
    /** @inheritDoc */
    public function updateuser($userid, $name, $email, $phone);
    /** @inheritDoc */
    public function createuser($name, $email, $phone, $password);
    /** @inheritDoc */
    public function deleteuser($id);
}
?>