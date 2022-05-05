<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workout;

class Exercice extends Model
{
    protected $table = "exercices";

    protected $fillable = [
        'title', 'text', 'subtext','catégorie','image','image1'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];

  
}
