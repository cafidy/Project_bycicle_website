<?php
namespace Site\Catchers;

/**
 * Exception pour les éléments introuvables en base de données.
 *
 * @package  Site\Catchers
 * @author   Yassine Elmsebli
 */
class NotexistException extends \Exception
{
    /** @inheritDoc */
    public function __construct($message)
    {
        parent::__construct($message, 10);
    }
}
?>

