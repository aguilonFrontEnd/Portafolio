<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cartController extends Controller
{
    function cartSelection () {

        return view('roles.buyer.cart.buyer_cart');
    }
}
