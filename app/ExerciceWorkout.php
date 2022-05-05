<?php

namespace App;
use App\ExerciceWorkout;

use Illuminate\Database\Eloquent\Model;

class ExerciceWorkout extends Model
{
    protected $table = "exercice_workouts";

    protected $fillable = [
        'id_workouts','exercice', 'sets', 'reps','weight'
    ];
}
