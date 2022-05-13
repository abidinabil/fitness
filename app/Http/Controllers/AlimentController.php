<?php

namespace App\Http\Controllers;
use App\Aliment;
use Illuminate\Http\Request;

class AlimentController extends Controller
{
    public function SaveAliment(Request $request){
        

    
      
        Aliment::create([
            
            'name'=> request()->name,
            'calorie'=> request()->calorie,
            'carbs'=> request()->carbs,
            'fat'=> request()->fat,
            'proteine'=> request()->proteine,
            'qty' => 1,
    
    
        ]);
        return response()->json([
          'message' => 'Aliment uploaded successfully'
      ],200);
      
  }
  public function getAliment(){
    $aliment = Aliment::all();
    return response()->json(
        
      $aliment
        );
       }
}
