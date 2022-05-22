<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliment extends Model
{
    protected $table = "aliments";

    protected $fillable = [
        'name', 'calorie', 'carbs','fat','proteine','qty','grammage'
    ];
}
