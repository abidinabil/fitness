<?php

namespace App\Http\Controllers;
use App\Exercice;

use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    public function SaveExercice(Request $request){
         
        $request->validate([
          'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
      ]);

      $file=$request->file('video');
      $file->move('video',$file->getClientOriginalName());
      $file_name=$file->getClientOriginalName();
        Exercice::create([
            'title'=> request()->title,
            'text'=> request()->text,
            'subtext'=> request()->subtext,
            'catégorie'=> request()->catégorie,

            'video'=> $file_name,


        ]);
        return 'saved exercice successfuly';
    }
}
