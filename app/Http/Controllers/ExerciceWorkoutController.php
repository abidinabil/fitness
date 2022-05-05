<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExerciceWorkout;

class ExerciceWorkoutController extends Controller
{
    public function saveExerciceWorkout(Request $request){
        

     
    
      
        ExerciceWorkout::create([
             'id_workouts' =>request()->id_workouts,
            'exercice'=> request()->exercice,
            'sets'=> request()->sets,
            'reps'=> request()->reps,
            'weight'=> request()->weight,
         
    
    
        ]);
        return response()->json([
          'message' => 'Workout uploaded successfully'
      ],200);
      
    }
    public function getExerciceWorkout($id){
        $workout = ExerciceWorkout::where('id_workouts','=',$id)->get();;
        return response()->json(
            
          $workout
            );
           }
           public function deleteExerciceWorkout($id){
            $workout = ExerciceWorkout :: find($id);
            if($workout){
                $workout -> delete ();
                return response()->json([
                 'message' =>'Exercice deleted succesfully',
                 'code' => 200,
                 
                
             ]);

            }else {
                 return response()->json([
                 'message' =>"Exercice with id:$id does not exist",   ]);
            }
        }
}
