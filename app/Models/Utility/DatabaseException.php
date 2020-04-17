<?php
/**
 * Model | app/Models/Utility/DatabaseException.php
 *
 * @package     cst323_milestone
 * @author      Henry Harvey & Jacob Taylor
 */
namespace App\Models\Utility;
//This model is for creating a custom database exception

use Exception;

class DatabaseException extends Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}