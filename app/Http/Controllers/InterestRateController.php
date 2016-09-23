<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InterestRateController extends Controller
{
   function getViewInterestRate(){
       return view('Comparisons.interest_rate');
   }
}
