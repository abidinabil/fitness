<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coach;

class CoachController extends Controller
{
    public function coach(){
         $coach = coach::all();
         return response()->json(
           $coach
             );
}
}
