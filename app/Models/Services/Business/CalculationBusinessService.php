<?php
namespace App\Models\Services\Business;

use App\Models\Utility\DatabaseModel;
use App\Models\Utility\MyLogger;
use App\Models\Services\Data\CalculationDataService;

class CalculationBusinessService
{

    function newCalculation($newCalculation)
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $newCalculation);

        $Database = new DatabaseModel();
        $db = $Database->getDb();

        $ds = new CalculationDataService($db);

        $flag = $ds->create($newCalculation);

        MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $flag);
        return $flag;
    }

    function getAllCalculations()
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        
        $Database = new DatabaseModel();
        $db = $Database->getDb();
        
        $ds = new CalculationDataService($db);
        
        $flag = $ds->readAll();
        
        MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1));
        return $flag;
    }
}
 
 
