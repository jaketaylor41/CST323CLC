<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Services\Business\CalculationBusinessService;
use App\Models\Utility\MyLogger;
use App\Models\Calculation;

class CalculatorController extends Controller
{

    /**
     * Controller method that takes in a request
     * Sets the data from the request to variables
     * Creates a Calculation object from the variables
     * Creates a calculation bs and calls its newCalculation method with the calculation
     * Creates an associative array with the object
     * Returns result view and pushes the data array
     *
     * @param Request $request
     *            Implicit request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory result view
     */
    public function onCalculate(Request $request)
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));

        // Sets the data from the request to variables
        $title = $request->input('title');
        $years = $request->input('years');
        $months = $request->input('months');
        $days = $request->input('days');
        $hours = $request->input('hours');

        // Creates a Calculation object from the variables
        $c = new Calculation($title, $years, $months, $days, $hours);
        
        // Creates a calculation bs and calls its newCalculation method with the calculation
        $bs = new CalculationBusinessService();
        $bs->newCalculation($c);

        // Creates an associative array with the object
        $data = [
            'c' => $c
        ];
        
        // Returns result view and pushes the data array
        MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to result view with result");
        return view('result')->with($data);
    }

    /**
     * Creates a calculation bs and calls its getAllCalculations method
     * If the result is null, returns the calculator view
     * Else creates an associative array with the object
     * Returns allCalculations view and pushes the data array
     *
     * @param Request $request
     *            Implicit request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory allCalculations view
     */
    public function onGetAll()
    {
        MyLogger::info("\Entering " . substr(strrchr(__METHOD__, "\\"), 1));
        try {
            
            // Creates a calculation bs and calls its getAllCalculations method
            $bs = new CalculationBusinessService();
            $flag = $bs->getAllCalculations();

            
            // If the result is null, returns the calculator view
            if ($flag == null) {
                MyLogger::warning("flag returned null");
                MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to calculator view");
                return view('calculator');
            }

            // Else creates an associative array with the object
            $data = [
                'allCalculations' => $flag
            ];
            
            // Returns allCalculations view and pushes the data array
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to allCalculations view with all calculations");
            return view('allCalculations')->with($data);
        } catch (Exception $e) {
            MyLogger::error("Exception ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            MyLogger::info("/Exiting  " . substr(strrchr(__METHOD__, "\\"), 1) . " to exception view");
            return view('exception')->with($data);
        }
    }
}
