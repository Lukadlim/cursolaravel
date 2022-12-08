<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Route;

class CartController extends Controller
{
    public function cartList() {
        $items = \Cart::getContent();
        return view('site.cart', compact('items'));
    }

    public function addCart(Request $request) {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qnt,
            'attributes' => array(
                'image' => $request->img
            ),
        ]);
    }
}
