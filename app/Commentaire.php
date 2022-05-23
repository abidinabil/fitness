<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = "commentaires";

    protected $fillable = [
        'id_user', 'id_post','commentaire' 
    ];
}
