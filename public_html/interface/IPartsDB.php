<?php
namespace Site\Model;

/**
 * Interface de la classe PartsDB.
 *
 * @package  Site\Model
 * @author   Yassine Elmsebli
 */
interface IPartsDB
{
    /** @inheritDoc */
    public function getallparts();
    /** @inheritDoc */
    public function getpart($idpart);
}
?>