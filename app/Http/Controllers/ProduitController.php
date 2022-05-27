<?php

namespace App\Http\Controllers;
use App\Produit;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function saveProduit(Request $request){
        

        $file_extension =$request -> image -> getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path ='C:\pfe-main\public\image\boutique';
        $request -> image -> move($path,$file_name);
    
      
        Produit::create([
    
            'name'=> request()->name,
            'categorie'=> request()->categorie,
            'sous_categorie'=> request()->sous_categorie,
            'slug'=> request()->slug,
            'description'=> request()->description,
            'price'=> request()->price,
            'image'=> $file_name,
    
    
        ]);
        return response()->json([
          'message' => 'Produit uploaded successfully'
      ],200);
      
    }
    public function getProduitByCategorie($categorie){
        $produit = Produit::where('categorie','=',$categorie)->get();
        return response()->json(
            
          $produit
            );
           }
           public function getProduit(){
            $produit = Produit::all();
            return response()->json(
                
              $produit
                );
               }
               public function deleteProduit($id){
                $produit = Produit:: find($id);
                if($produit){
                    $produit -> delete ();
                    return response()->json([
                     'message' =>'produit deleted succesfully',
                     'code' => 200,
                     
                    
                 ]);
              
                }else {
                     return response()->json([
                     'message' =>"produit with id:$id does not exist",   ]);
                }
              }
               public function getProduitMens($sous_categorie ){
                $produit = Produit::where('sous_categorie','=',$sous_categorie)
                 ->where('categorie','=','Mens')
                 
                ->get();
                return response()->json(
                    
                  $produit
                    );
                   }
                   public function getProduitWomens($sous_categorie ){
                    $produit = Produit::where('sous_categorie','=',$sous_categorie)
                     ->where('categorie','=','Womens')
                     
                    ->get();
                    return response()->json(
                        
                      $produit
                        );
                       }
                       public function getProduitAccessoires($sous_categorie ){
                        $produit = Produit::where('sous_categorie','=',$sous_categorie)
                         ->where('categorie','=','Accessoires')
                         
                        ->get();
                        return response()->json(
                            
                          $produit
                            );
                           }
                           public function getProduitProteine($sous_categorie ){
                            $produit = Produit::where('sous_categorie','=',$sous_categorie)
                             ->where('categorie','=','Proteine')
                             
                            ->get();
                            return response()->json(
                                
                              $produit
                                );
                               }

                               public function getProductDetails($id){
                                $produit = Produit::find($id);
                                return response()->json(
                                    
                                  $produit
                                    );
                                   }
                                   public function updateProduit($id){
                                    $produit = Produit::find($id);
                                    return response()->json($produit);
                                  }


      
    
    }

