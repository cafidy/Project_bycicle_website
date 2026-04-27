<?php
namespace Site\Catchers;

/**
 * Exception pour les erreurs de base de données.
 *
 * @package  Site\Catchers
 * @author   Yassine Elmsebli
 */
class DBException extends \Exception
{
    /** @inheritDoc */
    public function __construct($message)
    {
        parent::__construct($message, 1);
    }
}
?>