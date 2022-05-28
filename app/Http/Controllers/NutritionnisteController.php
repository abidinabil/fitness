<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nutritionniste;

class NutritionnisteController extends Controller
{

    /***********************  Save Nutritionniste *********************** */
    public function SaveNutritionniste(Request $request){
        

        $file_extension =$request -> photo -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\Nutritionniste';
        $request -> photo -> move($path,$file_name);
    
      
        Nutritionniste::create([
    
            'nom'=> request()->nom,
            'text'=> request()->text,
            'adresse'=> request()->adresse,
            'subtext'=> request()->subtext,
            'photo'=> $file_name,
    
    
        ]);
        return response()->json([
          'message' => 'Nutritionniste uploaded successfully'
      ],200);
      
    }
     /***********************  Fin Save Nutritionniste *********************** */

       /***********************  GET Nutritionniste *********************** */

    public function getNutritionniste(){
        $nutritionniste = Nutritionniste::all();
        return response()->json(
            
          $nutritionniste
            );
           }
    /***********************  Fin GET Nutritionniste *********************** */


    /***************************Delete Nutritionniste ****************** */
       

    public function deleteNutritionniste($id){
        $nutritionniste = Nutritionniste :: find($id);
        if($nutritionniste){
            $nutritionniste -> delete ();
            return response()->json([
             'message' =>'Nutrtionniste deleted succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"Nutrtionniste with id:$id does not exist",   ]);
        }
    }

     /***********************  Fin Delete Nutritionniste *********************** */

     /****************************Update Nutritionniste*************** */
     public function updateNutritionniste($id){
        $nutritionniste = Nutritionniste::find($id);
        return response()->json($nutritionniste);
    }
    
    /***********************  Fin Delete Nutritionniste *********************** */

    /************************Edit NUtritionniste *************** */
    
    public function editNutritionniste(){
        $nutritionniste = Nutritionniste::find(request()->id);
        $nutritionniste->nom = request()->nom;
        $nutritionniste->text = request()->text;
        $nutritionniste->subtext = request()->subtext;
        $nutritionniste->adresse = request()->adresse;
        
        $nutritionniste->photo = request()->photo;
        if($nutritionniste){
            $nutritionniste -> update ();
            return response()->json([
             'message' =>'Nutrtionniste update succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"Nutrtionniste with id:$id does not exist",   ]);
        }
    }
      /***********************  Fin Edit Nutritionniste *********************** */

    /**************************Search Nutritionniste ******************************* */
    public function searchNutritionniste($search){
        $nutritionniste = Nutritionniste::where('adresse','like','%'.$search.'%')->get();
        return response()->json($nutritionniste);
    }
    public function ModifierImageNutritionniste(Request $request,$id){
        try{
            $nutritionniste = Nutritionniste::find($id);
            if($request->hasFile("photo")){
                $file = $request->file("photo");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:\pfe-main\public\image\Nutritionniste',$filename);
                $nutritionniste->photo=$filename;
                $res=$nutritionniste->save();
                return response()->json($nutritionniste);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        
    }
   

    }
   

     

