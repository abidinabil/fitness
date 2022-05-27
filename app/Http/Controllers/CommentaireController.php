<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commentaire;
use Illuminate\Support\Facades\DB;
class CommentaireController extends Controller
{
    public function SaveCommentaire(){
        $commentaire = new Commentaire();
        $commentaire->id_user = request()->id_user;
        $commentaire->id_post = request()->id_post;
        $commentaire->commentaire = request()->commentaire;
  
        $commentaire->save();
        return response()->json([
            'message' =>'Commentaire created succesfully',
            'code' => 200,
            
           
        ]);


    }
    public function getCommentaire($id){
        $commentaire = DB::table('posts')
        ->join('commentaires','commentaires.id_post','posts.id')
        ->join('users','users.id','commentaires.id_user')
        ->where('posts.id',$id)
        ->get();
        return response()->json($commentaire);   
    }
    public function deleteCommentaire($id){
        $commentaire = Commentaire :: find($id);
        if($commentaire){
            $commentaire -> delete ();
            return response()->json([
            'message' =>'commentaire deleted succesfully',
            'code' => 200,
            
            
        ]);

        }else {
            return response()->json([
            'message' =>"commentaire with id:$id does not exist",   ]);
        }
    }
    /**************************Update Commentaire ****************** */
  //modifier name user
  public function updateCommentaire(Request $request,$id){
    $commentaire = Commentaire::where('id','=',$id)->update([
        'commentaire'=>$request->commentairet
        ]);
    return response()->json($commentaire);
}


}
