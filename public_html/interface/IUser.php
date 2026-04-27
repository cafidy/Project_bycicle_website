<?php
namespace Site\Entity;

/**
 * Interface de la classe User.
 *
 * @package  Site\Entity
 * @author   Yassine Elmsebli
 */
interface IUser
{
    /** @inheritDoc */
    public function __construct($userid, $name, $email, $phone);
}
?>