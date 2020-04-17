<?php
/**
 * Interface | app/Models/Utility/ILogger.php
 *
 * @package     cst323_milestone
 * @author      Henry Harvey & Jacob Taylor
 */
namespace App\Models\Utility;

interface ILogger
{

    static function getLogger();

    public static function debug($message, $data);

    public static function info($message, $data);

    public static function warning($message, $data);

    public static function error($message, $data);
}