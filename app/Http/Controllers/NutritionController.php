<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nutrition;

class NutritionController extends Controller
{

   
public function SaveNutrition(Request $request){
        
     
        $image = $request->file('image');
        if($request->hasFile('image')){
             $new_name= rand().'.'.$image->getClientOriginalExtension();
             $image->move(public_path('/images'),$new_name);

        Nutrition::create([
            'image'=> $new_name,
            'title'=> request()->title,
            'text'=> request()->text,
            'subtext'=> request()->subtext,
          


        ]);
    }
        return 'saved successfuly';
        print($request);
    }
   /* public function SaveNutrition(){
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


    }*/
    
  /*public function SaveNutrition(Request $request){
       
        $nutrition = new Nutrition();
      
        if($request->hasFile('image')){
            $image= $request->file('image');
           $ext = $image->extension();
           $file= time().'.'.$ext;
           $image->storeAs('public/customer',$file);
           $nutrition->image =$file;
         
        }
        $nutrition->title = request()->title;    
        $nutrition->text = request()->text;
        $nutrition->subtext = request()->subtext;
        $nutrition->image = request()->image;


    
        $nutrition->save();
        return response()->json([
            'message' =>'Nutrtion created succesfully',
            'code' => 200,
            
           
        ]);
    }  */
    

    
  /*  public function SaveNutrition(Request $request){
        $nutrition = new Nutrition();
        if($request->hasFile('files')){
            $pictures = [];
            foreach ($request->file('files') as $file) {
                # code...
                $filename->storeAs('public/customer',$file);
                $file->move(public_path('images') ,$filename);
                $pictures[] = $file;
                $nutrition->image =$pictures;
        
     
        $nutrition->title = request()->title;
        
        $nutrition->text = request()->text;
        $nutrition->subtext = request()->subtext;
      
        $nutrition->save();
        return response()->json([
            'message' =>'Nutrtion created succesfully',
            'code' => 200,
            
           
        ]);
    }}else{
                   return response()->json('image null');
               }

    }
    */
    

    

    
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
        
}

