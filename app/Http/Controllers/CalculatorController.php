<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Services\Business\CalculationBusinessService;
use App\Models\Calculation;

class CalculatorController extends Controller
{
    /**
     * Controller method that takes in a request
     * Sets the data from the request to variables
     * Creates a Calculation object from the variables
     * Creates an associative array with the object
     * Returns result view and pushes the data array
     * 
     * @param Request $request      Implicit request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory     result view
     */
    public function onCalculate(Request $request){
        $title = $request->input('title');
        $years = $request->input('years');
        $months = $request->input('months');
        $days = $request->input('days');
        $hours = $request->input('hours');
        
        $c = new Calculation(0, $title, $years, $months, $days, $hours);
        $bs = new CalculationBusinessService;
        $bs->newCalculation($c);
        
        $data = ['c' => $c];
        return view('result')->with($data);
    }
    
    public function onGetAll(){
        Log::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        try {
            $bs = new CalculationBusinessService();
            $flag = $bs->getAllCalculations();
            
            if ($flag == null) {
                Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to calculator view");
                return view('calculator');
            }
            
            $data = [
                'allCalculations' => $flag
            ];
            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to allCalculations view");
            return view('allCalculations')->with($data);
        } catch (Exception $e) {
            Log::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            Log::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to exception view");
            return view('exception')->with($data);
        }
    }
   
}
