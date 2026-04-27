<?php
namespace Site\Model;

/**
 * Interface de la classe OrderDB.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */
interface IOrderDB
{
    /** @inheritDoc */
    public function getactualorder($iduser);
    /** @inheritDoc */
    public function getpreviousorder($iduser);
    /** @inheritDoc */
    public function addpartorder($userid, $idpart);
    /** @inheritDoc */
    public function removepartorder($idodrpart);
    /** @inheritDoc */
    public function orderpassed($orderid, $userid);
}
?>