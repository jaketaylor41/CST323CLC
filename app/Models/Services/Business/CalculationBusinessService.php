<?php
namespace App\Models\Services\Business;

use App\Models\Services\Data\CalculationDataService;

class CalculationBusinessService
{

    private $dbService;

    function __construct()
    {
        $this->dbService = new CalculationDataService();
    }

    function newCalculation($newCalculation)
    {
        return $this->dbService->create($newCalculation);
    }

    function getCalculation($id)
    {
        return $this->dbService->read($id);
    }

    function getAllCalculations()
    {
        return $this->dbService->readAll();
    }

    function editCalculation($updatedCalculation)
    {
        return $this->dbService->update($updatedCalculation);
    }

    function deleteCalculation($id)
    {
        return $this->dbService->delete($id);
    }

}
 
 
