<?php

namespace App\Http\Controllers;
use App\Post;
use App\Enregistrement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnregistrementController extends Controller
{
    public function SaveEnregistrement($id_user,$id_post){
        try{
        $enr = Enregistrement::where('id_users','=',$id_user)->where('id_posts','=',$id_post)->first();
        if(!$enr){
        $enregistrement = Enregistrement::create([
            'id_posts' => request('id_posts'),
            'id_users' => request('id_users'),
        ]);}
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
            return response()->json($enregistrement);
    }
    public function getEnregistrementUser($id){
        $enregistrement = DB::table('posts')
        ->join('enregistrements','enregistrements.id_posts','posts.id')
        ->join('users','users.id','posts.id_user')
        ->where('enregistrements.id_users',$id)
        ->get();
        return response()->json($enregistrement);   
    }
    public function deleteEnregistrement($id){
        $enregistrement = Enregistrement :: find($id);
        if($enregistrement){
            $enregistrement -> delete ();
            return response()->json([
            'message' =>'Enregistrement deleted succesfully',
            'code' => 200,
            
            
        ]);

        }else {
            return response()->json([
            'message' =>"Post with id:$id does not exist",   ]);
        }
    }

}
