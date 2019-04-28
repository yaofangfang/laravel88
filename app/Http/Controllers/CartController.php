<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        
        return view('/cart/cart');
    }
    public function add_address(){
        return view('/cart/add_address');
    }
    public function address(){
        
        return view('/cart/address');
    }
    public function order(){
        return view('/cart/order');
    }
    public function pay(){
        return view('/cart/pay');
    }
}
