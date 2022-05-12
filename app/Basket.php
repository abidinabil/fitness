<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = "baskets";

    protected $fillable = [
        'id_produits', 'qty', 'price','id_user'
    ];
}
