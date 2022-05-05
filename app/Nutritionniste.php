<?php

namespace App;
use App\Nutritionniste;
use Illuminate\Database\Eloquent\Model;

class Nutritionniste extends Model
{
    protected $table = "nutritionnistes";

    protected $fillable = [
        'nom', 'text', 'subtext','adresse','photo'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
