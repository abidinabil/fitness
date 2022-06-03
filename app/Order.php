<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $casts = [
        'CartItems' => 'array'
    ];
 

    protected $fillable = [
        'id_user', 'CartItems'
    ];
}
