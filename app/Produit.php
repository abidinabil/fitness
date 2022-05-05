<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = "produits";

    protected $fillable = [
        'name', 'categorie', 'sous_categorie','slug','price','description','image_p','image'
    ];
}
