<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function SavePost(Request $request){
        $file_extension =$request -> image -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\Post';
        $request -> image -> move($path,$file_name);
    
      
        Post::create([
            
            'id_user'=> request()->id_user,
            'post'=> request()->post,
            'image'=> $file_name,
    
    
        ]);
        return response()->json([
          'message' => 'Post uploaded successfully'
      ],200);
      
  }
  public function getPost(){
    $post = DB::table('posts')
   
    ->join('users','users.id','posts.id_user')
    
    ->get();
    return response()->json($post);   
}
}