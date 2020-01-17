<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\Business\CalculationBusinessService;
use App\Models\Calculation;

class CalculatorController extends Controller
{
    public function calculate(Request $request){
        $title = $request->input('title');
        $years = $request->input('years');
        $months = $request->input('months');
        $days = $request->input('days');
        $hours = $request->input('hours');
        
        $c = new Calculation(0, $title, $years, $months, $days, $hours);
        //$bs = new CalculationBusinessService;
        //$bs->newCalculation($c);
        
        $data = ['c' => $c];
        return view('result')->with($data);
    }
   
}
