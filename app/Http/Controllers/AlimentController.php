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
            'grammage'=> request()->grammage,
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
       public function deleteAliment($id){
        $aliment = Aliment:: find($id);
        if($aliment){
            $aliment -> delete ();
            return response()->json([
             'message' =>'Aliment deleted succesfully',
             'code' => 200,
             
            
         ]);
      
        }else {
             return response()->json([
             'message' =>"aliment with id:$id does not exist",   ]);
        }
      }
       /***********************************Update Coach ******************* */
       public function updateAliment($id){
        $aliment = Aliment::find($id);
        return response()->json($aliment);
      }
/***********************************Fin Update Coach ******************* */
       /***********************************Edit coach *********************** */
            public function editAliment(){
              
  
              $aliment = Aliment::find(request()->id);
              $aliment->name = request()->name;
              $aliment->calorie = request()->calorie;
              $aliment->carbs = request()->carbs;
              $aliment->fat = request()->fat;
              $aliment->proteine = request()->proteine;
              $aliment->grammage = request()->grammage;
              $aliment->update();
              return 'ok';

            }

             /*********************************** fin Edit coach *********************** */

       public function searchAliment($search){
        $aliment = Aliment::where('name','like','%'.$search.'%')->get();
        return response()->json($aliment);
    }
    public function getAlimentById($id){
      $aliment = Aliment::where('id',$id)->first();
      return response()->json($aliment);
  }
  public function updateAlimentUser($name){
    $aliment = Aliment::where('name','=',$name)->first();;
    return response()->json(
        
      $aliment
        );
       }
}
