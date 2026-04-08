<?php
namespace Site\Model;

interface IPartsDB {
    public function getallparts();
    public function getpart($idpart);
}
?>