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
        $regime->qty = request()->qty;
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
    /************************************Delete Coach ********************* */
public function deleteRegime($id){
  $regime = Regime:: find($id);
  if($regime){
      $regime -> delete ();
      return response()->json([
       'message' =>'aliment deleted succesfully',
       'code' => 200,
       
      
   ]);

  }else {
       return response()->json([
       'message' =>"Coach with id:$id does not exist",   ]);
  }
}
    public function getRegime($id){
        $regime = Regime::where('id_user','=',$id)->get();;
        return response()->json(
            
          $regime
            );
           }
            /***********************************Update regime ******************* */
            public function updateRegime($id){
              $regime = Regime::find($id);
              return response()->json($regime);
            }
 /***********************************Fin Update regime ******************* */

  /***********************************Edit regime *********************** */
  public function editRegime(){
    
    $regime = Regime::find(request()->id);
    $regime->name = request()->name;
    $regime->qty = request()->qty;
    $regime->calorie = request()->calorie;

    $regime->carbs = request()->carbs;
    $regime->fat = request()->fat;
    $regime->proteine = request()->proteine;
    $regime->categorieType = request()->categorieType;
    $regime->update();
    return 'ok';

  }

   /*********************************** fin Edit coach *********************** */
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
