<?php

/**
 * exceptions repository
 *
 * This class is an exception that take care of errors related 
 * to elements not existing in the datavase
 * 
 * Responsibilities:
 * - throw when trying to fecth something that dosnt exist
 * Dependencies:
 *
 * @package Site\Cacthers
 * @author yassine elmsebli
 */

namespace Site\Catchers;

class NotexistException extends \Exception{
    public function __construct($message){
        parent::__construct($message,10);
    }
}

?>

