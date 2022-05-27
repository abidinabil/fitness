<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coach;

class CoachController extends Controller
{  
  /**************************Save Coach******************* */
public function SaveCoach(Request $request){
        

    $file_extension =$request -> photo -> getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path ='C:\pfe-main\public\image';
    $request -> photo -> move($path,$file_name);

  
    coach::create([

        'name'=> request()->name,
        'age'=> request()->age,
        'text'=> request()->text,
        'specialite'=> request()->specialite,
        'subtext'=> request()->subtext,
        'adresse'=> request()->adresse,
        'photo'=> $file_name,


    ]);
    return response()->json([
      'message' => 'Coach uploaded successfully'
  ],200);
  
}
/******************************Fin Save Coach ******************* */

/*********************************Get Coach********************* */
public function getCoach(){
  $coach = Coach::all();
  return response()->json(
      
    $coach
      );
     }
/***********************************Fin Get Coach */ 
 
/************************************Delete Coach ********************* */
public function deleteCoach($id){
  $coach = Coach:: find($id);
  if($coach){
      $coach -> delete ();
      return response()->json([
       'message' =>'Coach deleted succesfully',
       'code' => 200,
       
      
   ]);

  }else {
       return response()->json([
       'message' =>"Coach with id:$id does not exist",   ]);
  }
}
/************************************Fin Delete Coach */
 /***********************************Update Coach ******************* */
            public function updateCoach($id){
              $coach = Coach::find($id);
              return response()->json($coach);
            }
 /***********************************Fin Update Coach ******************* */
  /***********************************Edit coach *********************** */
            public function editCoach(){
    
              $coach = Coach::find(request()->id);
              $coach->name = request()->name;
              $coach->text = request()->text;
              $coach->subtext = request()->subtext;
        
              $coach->age = request()->age;
              $coach->specialite = request()->specialite;
              $coach->adresse = request()->adresse;
              $coach->update();
              return 'ok';

            }

             /*********************************** fin Edit coach *********************** */

             /***************************************recherche coach ************************ */
               /**************************Search Nutritionniste ******************************* */
    public function searchCoach($search){
      $coach = Coach::where('adresse','like','%'.$search.'%')->get();
      return response()->json($coach);
  }
            }
