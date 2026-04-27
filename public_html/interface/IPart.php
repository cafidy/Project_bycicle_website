<?php
namespace Site\Entity;

/**
 * Interface de la classe Part.
 *
 * @package  Site\Entity
 * @author   Yassine Elmsebli
 */
interface IPart
{
    /** @inheritDoc */
    public function __construct($id, $name, $price, $stock, $desc, $img);
}
?>