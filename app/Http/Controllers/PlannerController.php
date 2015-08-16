<?php

namespace Grocer\Http\Controllers;

use Illuminate\Http\Request;

use Grocer\Http\Requests;
use Grocer\Http\Controllers\Controller;

class PlannerController extends Controller
{
   
   public function planner()
   {
        return view('planner');
   }
}
