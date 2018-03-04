<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        //Cart::destroy();
        return view('cart.index');
    }

    public function checkout()
    {
        $this->middleware('auth');
    }
}
