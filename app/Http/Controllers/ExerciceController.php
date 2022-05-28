<?php

namespace App\Http\Controllers;
use App\Exercice;

use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    public function SaveExercice(Request $request){
        

        $file_extension =$request -> image -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\Exercice';
        $request -> image -> move($path,$file_name);
        
        $file_extension1 =$request -> image1 -> getClientOriginalExtension();
        $file_name1 =time().'.'.$file_extension1;
        $path ='C:\pfe-main\public\image\Exercice';
        $request -> image1 -> move($path,$file_name1);
    
      
        Exercice::create([
            
            'title'=> request()->title,
            'text'=> request()->text,
            'subtext'=> request()->subtext,
            'catégorie'=> request()->catégorie,
            'image'=> $file_name,
            'image1'=> $file_name1,
    
    
        ]);
        return response()->json([
          'message' => 'exercice uploaded successfully'
      ],200);
      
  }
  public function getExercice(){
    $exercice = Exercice::all();
    return response()->json(
        
      $exercice
        );
       }
       public function deleteExercice($id){
        $exercice = Exercice:: find($id);
        if($exercice){
            $exercice -> delete ();
            return response()->json([
             'message' =>'Exercice deleted succesfully',
             'code' => 200,
             
            
         ]);
      
        }else {
             return response()->json([
             'message' =>"Coach with id:$id does not exist",   ]);
        }
      }
       public function getExerciceByCategorie($categorie){
        $exercice = Exercice::where('catégorie','=',$categorie)->get();
        return response()->json(
            
          $exercice
            );
           }

           public function getExerciceDetails($id){
            $exercice = Exercice::find($id);
            return response()->json(
                
              $exercice
                );
               }
                /***********************************Update Coach ******************* */
            public function updateExercice($id){
              $exercice = Exercice::find($id);
              return response()->json($exercice);
            }
 /***********************************Fin Update Coach ******************* */
          /***********************************Edit coach *********************** */
          public function editExercice(){
            
            $exercice = Exercice::find(request()->id);
            $exercice->title = request()->title;
            $exercice->text = request()->text;
            $exercice->subtext = request()->subtext;

            $exercice->catégorie = request()->catégorie;
           
            $exercice->update();
            return 'ok';

          }

          /*********************************** fin Edit coach *********************** */
          public function ModifierImage(Request $request,$id){
            try{
                $exercice = Exercice::find($id);
                if($request->hasFile("image")){
                    $file = $request->file("image");
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('C:\pfe-main\public\image\Exercice',$filename);
                    $exercice->image=$filename;
                    $res=$exercice->save();
                    return response()->json($exercice);
                }
            }catch(Exeption $e){
                return response()->json([
                    "message" => $e->getMessage()
                ]);
            }
            
        }
        public function ModifierImage2(Request $request,$id){
          try{
              $exercice = Exercice::find($id);
              if($request->hasFile("image1")){
                  $file = $request->file("image1");
                  $extension=$file->getClientOriginalExtension();
                  $filename=time().'.'.$extension;
                  $file->move('C:\pfe-main\public\image\Exercice',$filename);
                  $exercice->image1=$filename;
                  $res=$exercice->save();
                  return response()->json($exercice);
              }
          }catch(Exeption $e){
              return response()->json([
                  "message" => $e->getMessage()
              ]);
          }
          
      }
      public function searchExercice($search){
        $exercice = Exercice::where('catégorie','like','%'.$search.'%')->get();
        return response()->json($exercice);
    }
}
