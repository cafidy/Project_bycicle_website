<?php
namespace Site\Catchers;

/**
 * Exception pour les erreurs de validation.
 *
 * @package  Site\Catchers
 * @author   Yassine Elmsebli
 */
class ValidationException extends \Exception
{
    /** @inheritDoc */
    public function __construct($message)
    {
        parent::__construct($message, 11);
    }
}
?>