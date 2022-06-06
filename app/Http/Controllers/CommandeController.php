<?php

namespace App\Http\Controllers;
use App\Commande;
use App\Basket;
use App\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function commande($user_id){
        $produits = Basket::where('id_user',$user_id )->get();
        // dd($produits);
        $produit_id = [];
        foreach($produits as $produit){
            // $commande->id_produits = $produit->id; 
        
            // dd($commande);
            $commande = new Commande;
            // $produit_id[] = Produit::where('id', $produit->id)->first()->id;
            $commande->id_produits = $produit->id;
            $commande->id_user = $user_id;
            $commande->qty = request()->qty;
            $commande->name = request()->name;
            $commande->adresse = request()->adresse;
            $commande->Ntlfn = request()->Ntlfn;
            $commande->CodePostal = request()->CodePostal;
            $commande->save();
            $produit->delete();
            
           

            // $commande = Commande::create([
            //         'id_produits' => 
            //     ])
        }
        
        
        // dd($produit_id);
       

    
    }
    
}
