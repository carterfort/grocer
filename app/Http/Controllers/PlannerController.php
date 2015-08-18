<?php

namespace Grocer\Http\Controllers;

use Grocer\Http\Controllers\Controller;
use Grocer\Http\Requests;
use Grocer\Models\WeeklyList;
use Illuminate\Http\Request;

class PlannerController extends Controller
{
   
   public function planner()
   {

   		$thisWeek = WeeklyList::currentWeek();
        return view('planner', compact('thisWeek'));
   }
}
