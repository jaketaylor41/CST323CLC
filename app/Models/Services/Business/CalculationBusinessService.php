<?php
namespace App\Models\Services\Business;

use App\Models\Utility\DatabaseModel;
use App\Models\Utility\MyLogger;
use App\Models\Services\Data\CalculationDataService;

class CalculationBusinessService
{

    /**
     * Takes in a caluclation model to be added
     * Creates a new database model and gets the database from it
     * Creates calclation data service and calls create method with the new calculation
     * Sets db to null
     * Returns flag
     *
     * @param
     *            newCalculation calculation to be created
     * @return {@link Integer} number of rows affected
     */
    function newCalculation($newCalculation)
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $newCalculation);

        // Creates a new database model and gets the database from it
        $Database = new DatabaseModel();
        $db = $Database->getDb();

        // Creates calclation data service and calls create method with the new calculation
        $ds = new CalculationDataService($db);
        $flag = $ds->create($newCalculation);
        
        // Sets db to null
        $db = null;

        // Returns flag
        MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with " . $flag);
        return $flag;
    }

    /**
     * Creates a new database model and gets the database from it
     * Creates calculation data service and calls readAll method
     * Sets db to null
     * Returns flag
     *
     * @return    Array array of calculations found
     */
    function getAllCalculations()
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));

        // Creates a new database model and gets the database from it
        $Database = new DatabaseModel();
        $db = $Database->getDb();

        // Creates calculation data service and calls readAll method
        $ds = new CalculationDataService($db);
        $flag = $ds->readAll();
        
        // Sets db to null
        $db = null;

        // Returns flag
        MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " with array of calculations");
        return $flag;
    }
}
 
 
