<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Produit;
use Illuminate\Support\Facades\DB;
class BasketController extends Controller
{

    public function addToCart(Request $request , $user_id , $produit_id){
      try{
        $qty = 1;
        $produit = Produit::find($produit_id)->first();
       //todo insert inside backet if not existe and update if exist
       $basket =Basket::where('id_produits',$produit_id)->where('id_user', $user_id)->first();

       if (!$basket) {
           Basket::create([
               'id_produits' => $produit_id,
               'id_user' => $user_id,
               'qty' => 1,
             

           ]);
       }} catch(Exeception $e) {
        return response()->json([
            'message' =>$e->getMessage(),
            
            
        ]);
       }
      
      
     $basket_count = Basket::where('id_produits', $produit_id)->where('id_user', $user_id)->count();
     return response()->json(["basket_count" => $basket_count], 200);  
    }


    public function getProduitUser($id){
        $produit = DB::table('produits')
        ->join('baskets','baskets.id_produits','produits.id')
        ->join('users','users.id','baskets.id_user')
        ->where('users.id',$id)
        ->get();
        return response()->json($produit);   
    }
    public function deleteProduitPanier($id){
        $produit = Basket :: find($id);
        if($produit){
            $produit -> delete ();
            return response()->json([
             'message' =>'Produit deleted succesfully',
             'code' => 200,
             
            
         ]);

        }else {
             return response()->json([
             'message' =>"Produit with id:$id does not exist",   ]);
        }
    }
   
}
