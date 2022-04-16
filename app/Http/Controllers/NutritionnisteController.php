<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nutritionniste;

class NutritionnisteController extends Controller
{

    /***********************  Save Nutritionniste *********************** */
    public function SaveNutritionniste(){
        $nutritionniste = new Nutritionniste();
        $nutritionniste->nom = request()->nom;
        $nutritionniste->text = request()->text;
        $nutritionniste->subtext = request()->subtext;
        $nutritionniste->adresse = request()->adresse;
        $nutritionniste->photo = request()->photo;
        if($nutritionniste){
        $nutritionniste->save();
        return response()->json([
            'message' =>'Nutrtionniste created succesfully',
            'code' => 200,
            
           
        ]);
    }else {
        return response()->json([
            'message' =>'erreur',
            
            
           
        ]);
    }

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

    }
     /***********************  Fin Edit Nutritionniste *********************** */

