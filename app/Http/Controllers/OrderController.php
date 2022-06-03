<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function storeCart(Request $request)
    {
       
        $order = new Order();

     
        $order->id_user=$request->id_user;
        $order->cartItems = $request->cartItems;
       
      

        $order->save();

        return response($order, 201);
    }


}
