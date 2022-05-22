<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    protected $table = "regimes";

    protected $fillable = [
        'id_user' ,'name', 'calorie', 'carbs','fat','proteine','grammage'
    ];
}
