<?php

namespace App\Http\Controllers;
use App\Regime;
use App\User;
use Illuminate\Http\Request;

class RegimeController extends Controller
{
    public function SaveRegime(){
        $regime = new Regime();
        $regime->id_user = request()->id_user;
        $regime->name = request()->name;
        $regime-> calorie = request()->calorie;
        $regime->carbs = request()->carbs;
        $regime->fat = request()->fat;
        $regime->proteine = request()->proteine;
        $regime->grammage = request()->grammage;
        $regime->categorieType = request()->categorieType;
       
        


        $regime->save();
        return response()->json([
            'message' =>'regime created succesfully',
            'code' => 200,
            
           
        ]);


    }
    public function getRegime($id){
        $regime = Regime::where('id_user','=',$id)->get();;
        return response()->json(
            
          $regime
            );
           }
    public function getRegimeByPdejuner($id){
        $regime = Regime::where('categorieType','=','Pdejuner')
        ->where('id_user','=',$id)
        ->get();
        return response()->json(
            
          $regime
            );
           }
           public function getRegimeByDejuner($id){
            $regime = Regime::where('categorieType','=','Dejuner')
            ->where('id_user','=',$id)
            ->get();
            return response()->json(
                
              $regime
                );
               }
               public function getRegimeByDinner($id){
                $regime = Regime::where('categorieType','=','Dinner')
                ->where('id_user','=',$id)
                ->get();
                return response()->json(
                    
                  $regime
                    );
                   }
                   public function getRegimeBySnack($id){
                    $regime = Regime::where('categorieType','=','Snack')
                    ->where('id_user','=',$id)
                    ->get();
                    return response()->json(
                        
                      $regime
                        );
                       }
         
}
