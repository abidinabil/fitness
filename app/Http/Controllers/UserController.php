<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function updatePasswordUser(Request $request,$id){
        $user = User::where('id','=',$id)->update([
            'password' => Hash::make(request('password')),
          

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
    /*********************************Get Coach********************* */
public function getAllUser(){
    $user = User::all();
    return response()->json(  
      $user
        );
       }
       public function deleteUser($id){
        $user = User:: find($id);
        if($user){
            $user -> delete ();
            return response()->json([
             'message' =>'user deleted succesfully',
             'code' => 200,
             
            
         ]);
      
        }else {
             return response()->json([
             'message' =>"user with id:$id does not exist",   ]);
        }
      }
       /***********************************Update admin ******************* */
       public function updateAdmin($id){
        $user = User::find($id);
        return response()->json($user);
      }
/***********************************Fin Update Coach ******************* */
/***********************************Edit coach *********************** */
      public function editAdmin(){

        $user = User::find(request()->id);
        $user->name = request()->name;
        $user->email = request()->email;
      
        $user->update();
        return 'ok';

      }

       /*********************************** fin Edit coach *********************** */
       public function SaveAdmin(Request $request){     
        User::create([
    
            'name'=> request()->name,
            'email'=> request()->email,
            'password' => Hash::make(request('password')),
             'role'=> request()->role,

        ]);
        return response()->json([
          'message' => 'admin uploaded successfully'
      ],200);
      
    }
    public function searchUser($search){
        $user = User::where('role','like','%'.$search.'%')->get();
        return response()->json($user);
    }
}
