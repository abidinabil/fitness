<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = "salles";

    protected $fillable = [
        'name', 'text', 'subtext','adresse','photo'
    ];
}
