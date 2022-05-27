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
        $enr = Enregistrement::where('id_user','=',$id_user)->where('id_posts','=',$id_post)->first();
        if(!$enr){
        $enregistrement = Enregistrement::create([
            'id_posts' => request('id_posts'),
            'id_user' => request('id_user'),
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
        ->join('users','users.id','enregistrements.id_user')
        ->where('users.id',$id)
        ->get();
        return response()->json($enregistrement);   
    }

}
