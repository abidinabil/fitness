<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;

class WorkoutController extends Controller
{
      public function SaveWorkout(){
        $workout = new Workout();
        $workout->id_user = request()->id_user;
        $workout->workoutName = request()->workoutName;
       
        


        $workout->save();
        return response()->json([
            'message' =>'Workout created succesfully',
            'code' => 200,
            
           
        ]);


    }
    public function deleteWorkout($id){
        $workout = Workout :: find($id);
        if($workout){
            $workout -> delete ();
            return response()->json([
             'message' =>'workout deleted succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"workout with id:$id does not exist",   ]);
        }
    }
    public function getWorkout($id){
        $workout = workout::where('id_user','=',$id)->get();;
        return response()->json(
            
          $workout
            );
           }
           
           public function getWorkoutDetails($id){
            $workout = Workout::find($id);
            return response()->json(
                
              $workout
                );
               }
              
}
