<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;

class ImagesController extends Controller
{
/* public function SaveImages(Request $request){
        if($request ->hasFile('files')){
            $pictures = [];
            foreach($request->file('files') as $file){
                $filename='/images/'.$file->getclientoriginalName();
                $file->move(public_path('images'),$filename);
                $pictures[] = $filename;
            }
            Images::create([
                'images' => request()->$pictures,
                'text'=> request()->text,
            ]);
            return response()->json(['message' => "image added"]);
        }
    }  */
      
public function store(Request $request){
        

      $file_extension =$request -> images -> getClientOriginalExtension();
      $file_name =time().'.'.$file_extension;
      $path ='C:\Users\user\fitbody\src\assets\img';
      $request -> images -> move($path,$file_name);
  
    
      Images::create([
          
        
          'images'=> $file_name,
  
  
      ]);
      return response()->json([
        'message' => 'File uploaded successfully'
    ],200);
    
} 

/*public function store(Request $request)
{
    if($request->hasFile('files')){
        $pictures=[];
        foreach($request->file('files') as $file){
            $filename='C:\pfe-main\public\image\boutique/'.$file->getClientOriginalName();
            $path ='C:\pfe-main\public\image\boutique';
            $file->move($path,$filename);
            $pictures[]=$filename;
        }
        Images::create([
            'images' => json_encode($pictures),
            'name'=> request()->name,
     
        ]);
        return response()->json(['message' => 'image added']);
    }
} */
public function getImages()
{
    $images = Images::orderBy('created_at' ,'DESC')->get();
    foreach($images as $data){
        $data->images = json_decode($data->images);
    }
    return response()->json(['images' =>$images]);
}


  
   
}
