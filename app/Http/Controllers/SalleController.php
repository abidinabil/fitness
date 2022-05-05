<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salle;
class SalleController extends Controller
{
    public function SaveSalle(Request $request){
    /*   $file_extension =$request -> photo -> getClientOriginalExtension();
         $file_name =time().'.'.$file_extension;
         $path ='images';
         $request -> photo -> move($path,$file_name);*/

    $salle = new Salle();
        
        $salle->name = request()->name;
        $salle->text = request()->text;
        $salle->subtext = request()->subtext;
        $salle->adresse = request()->adresse;
        $salle->photo = request()->photo;
        $salle->save();
        return response()->json([
            'message' =>'Salle de sport created succesfully',
            'code' => 200,
            
        ]);
}

public function getSalle(){
    $salle = Salle::all();
    return response()->json(
        
      $salle
        );
       }
      
       public function deleteSalle($id){
           $salle = Salle:: find($id);
           if($salle){
               $salle -> delete ();
               return response()->json([
                'message' =>'Salle de sport deleted succesfully',
                'code' => 200,
                
               
            ]);

           }else {
                return response()->json([
                'message' =>"Salle de sport with id:$id does not exist",   ]);
           }
       }

       public function updateSalle($id){
           $salle = Salle::find($id);
           return response()->json($salle);
       }

       public function editSalle(){
           $salle = Salle::find(request()->id);
           $salle->name = request()->name;
           $salle->text = request()->text;
           $salle->subtext = request()->subtext;
           $salle->photo = request()->photo;
           $salle->adresse = request()->adresse;
           $salle->update();
           return 'ok';

       }
}
