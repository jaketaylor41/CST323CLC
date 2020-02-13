<?php
namespace App\Models\Services\Business;

use Illuminate\Support\Facades\Log;
use App\Models\Utility\DatabaseModel;
use App\Models\Services\Data\CalculationDataService;

class CalculationBusinessService
{

    function newCalculation($newCalculation)
    {
        Log::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $newCalculation);

        $Database = new DatabaseModel();
        $db = $Database->getDb();

        $ds = new CalculationDataService($db);

        $flag = $ds->create($newCalculation);

        Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $flag);
        return $flag;
    }

    function getAllCalculations()
    {
        Log::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        
        $Database = new DatabaseModel();
        $db = $Database->getDb();
        
        $ds = new CalculationDataService($db);
        
        $flag = $ds->readAll();
        
        Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1));
        return $flag;
    }
}
 
 
