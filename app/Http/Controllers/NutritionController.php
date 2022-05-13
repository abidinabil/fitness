<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nutrition;

class NutritionController extends Controller
{

   
    public function SaveNutrition(Request $request){
        

        $file_extension =$request -> image -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\Nutrition';
        $request -> image -> move($path,$file_name);
    
      
        Nutrition::create([
            
            'title'=> request()->title,
            'text'=> request()->text,
            'subtext'=> request()->subtext,
            'image'=> $file_name,
    
    
        ]);
        return response()->json([
          'message' => 'Nutrition uploaded successfully'
      ],200);
      
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
           public function upload(Request $request){
               $image= $request->file('image');
               if($request->hasFile('image')){
                  $new_name = rand().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('/uploads/images'),$new_name);
                  return response()->json($new_name);
               }else{
                   return response()->json('image null');
               }
           }
      /*     public function store(Request $request){
            //insert photo 
             $file_extension =$request -> photo -> getClientOriginalExtension();
             $file_name =time().'.'.$file_extension;
             $path ='images';
             $request -> photo -> move($path,$file_name);
           } */

           public function getNutritionDetails($id){
            $nutrition = Nutrition::find($id);
            return response()->json(
                
              $nutrition
                );
               }
        
}

