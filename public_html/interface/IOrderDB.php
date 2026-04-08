<?php
namespace Site\Model;

interface IOrderDB {
    public function getactualorder($iduser);
    public function getpreviousorder($iduser);
    public function addpartorder($userid, $idpart);
    public function removepartorder($idodrpart);
    public function orderpassed($orderid, $userid);
}
?>