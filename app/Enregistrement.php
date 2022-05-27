<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enregistrement extends Model
{
    protected $table = "enregistrements";

    protected $fillable = [
        'id_posts' ,'id_user'
    ];
}
