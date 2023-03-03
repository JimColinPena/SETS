<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculator(){
            return view('dashboard.calculator.index');
        }
}
