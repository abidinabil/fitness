<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateProfil(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'weight' =>$request->weight,
            'taille' =>$request->taille,

        ]);
       
        return response()->json($user);
    }
    public function getUser($id){
        $user = User::find($id);
        return response()->json(
            
          $user
            );
           }
           //photo de profil
    public function updateimage(Request $request,$id){
        try{
            $user = User::find($id);
            if($request->hasFile("photo")){
                $file = $request->file("photo");
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('C:\pfe-main\public\image\ProfileUser',$filename);
                $user->photo=$filename;
                $res=$user->save();
                return response()->json($user);
            }
        }catch(Exeption $e){
            return response()->json([
                "message" => $e->getMessage()
            ]);
        }
        
    }
}
