<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    protected $table = "coaches";

    protected $fillable = [
        'name', 'text', 'subtext','age','specialite','photo'
    ];

   
    protected $hidden = [
        'created_at	', 'updated_at',
    ];
}
