<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salle;
class SalleController extends Controller
{
    public function SaveGym(Request $request){
        

        $file_extension =$request -> photo -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\Gym';
        $request -> photo -> move($path,$file_name);
    
      
        Salle::create([
    
            'name'=> request()->name,
            'text'=> request()->text,
            'adresse'=> request()->adresse,
            'subtext'=> request()->subtext,
            'photo'=> $file_name,
    
    
        ]);
        return response()->json([
          'message' => 'Gym uploaded successfully'
      ],200);
      
    }
     /***********************  Fin Save gym *********************** */

       /***********************  GET gym *********************** */

    public function getGym(){
        $gym = Salle::all();
        return response()->json(
            
          $gym
            );
           }
    /***********************  Fin GET gym *********************** */


    /***************************Delete gym ****************** */
       

    public function deleteGym($id){
        $gym = Salle :: find($id);
        if($gym){
            $gym -> delete ();
            return response()->json([
             'message' =>'Gym deleted succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"Gym with id:$id does not exist",   ]);
        }
    }

     /***********************  Fin Delete Nutritionniste *********************** */

     /****************************Update Nutritionniste*************** */
     public function updateGym($id){
        $gym = Salle::find($id);
        return response()->json($gym);
    }
    
    /***********************  Fin Delete Nutritionniste *********************** */

    /************************Edit NUtritionniste *************** */
    
    public function editGym(){
        $gym = Salle::find(request()->id);
        $gym->name = request()->name;
        $gym->text = request()->text;
        $gym->subtext = request()->subtext;
        $gym->adresse = request()->adresse;
        
        $gym->photo = request()->photo;
        if($gym){
            $gym -> update ();
            return response()->json([
             'message' =>'Gym update succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"Gym with id:$id does not exist",   ]);
        }
    }
      /***********************  Fin Edit Nutritionniste *********************** */

    /**************************Search Nutritionniste ******************************* */
    public function searchGym($search){
        $gym = Salle::where('adresse','like','%'.$search.'%')->get();
        return response()->json($gym);
    }
    public function ModifierImageGym(Request $request,$id){
        try{
            $gym = Salle::find($id);
            if($request->hasFile("photo")){
                $file = $request->file("photo");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:\pfe-main\public\image\Gym',$filename);
                $gym->photo=$filename;
                $res=$gym->save();
                return response()->json($gym);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        
    }
 
}
