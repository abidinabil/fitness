<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nutrition;

class NutritionController extends Controller
{
    public function SaveNutrition(){
        $nutrition = new Nutrition();
        $nutrition->title = request()->title;
        
        $nutrition->text = request()->text;
        $nutrition->subtext = request()->subtext;
        $nutrition->image = request()->image;
        $nutrition->save();
        return response()->json([
            'message' =>'Nutrtion created succesfully',
            'code' => 200,
            
           
        ]);


    }
    public function getNutrition(){
        $nutrition = Nutrition::all();
        return response()->json(
            
          $nutrition
            );
           }
          
           public function deleteNutrition($id){
               $nutrition = Nutrition :: find($id);
               if($nutrition){
                   $nutrition -> delete ();
                   return response()->json([
                    'message' =>'Nutrtion deleted succesfully',
                    'code' => 200,
                    
                   
                ]);

               }else {
                    return response()->json([
                    'message' =>"Nutrtion with id:$id does not exist",   ]);
               }
           }

           public function updateNutrition($id){
               $nutrition = Nutrition::find($id);
               return response()->json($nutrition);
           }

           public function editNutrition(){
               $nutrition = Nutrition::find(request()->id);
               $nutrition->title = request()->title;
               $nutrition->text = request()->text;
               $nutrition->subtext = request()->subtext;
               $nutrition->image = request()->image;
               $nutrition->update();
               return 'ok';

           }
           public function store(Request $request){
            //insert photo 
             $file_extension =$request -> photo -> getClientOriginalExtension();
             $file_name =time().'.'.$file_extension;
             $path ='images';
             $request -> photo -> move($path,$file_name);
           }
        
}

