<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    protected $table = "exercices";

    protected $fillable = [
        'title', 'text', 'subtext','catégorie','video'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
