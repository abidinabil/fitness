<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exercice;

class Workout extends Model
{
    protected $table = "workouts";

    protected $fillable =[
        'workoutName',
       
        'id_user',
    ];
    public function exercices(){
        return $this->hasMany(Exercice::class);
    }
}
