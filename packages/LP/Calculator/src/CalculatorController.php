<?php

namespace LP\Calculator;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Controllerl;
use Brick\Math\Internal\Calculator;

class CalculatorController extends Controller
{
    //
    public function add($a,$b)
    {
        
        
        $results= $a+$b;
        return view ('Calculator::add_cal',compact('results'));
    }
}
