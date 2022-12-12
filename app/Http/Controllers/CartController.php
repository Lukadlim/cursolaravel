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
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            ),
        ]);

        return redirect()->route('site.cart')->with('success', 'The product was successfully added');
    }

    public function removeCart(Request $request) {

        \Cart::remove($request->id);
        return redirect()->route('site.cart')->with('success', 'The product was successfully removed');
    }

    public function updateCart(Request $request) {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ],
        ],
        );
        return redirect()->route('site.cart')->with('success', 'The product was successfully updated');
    }

    public function clearCart() {
        \Cart::clear();
        return redirect()->route('site.cart')->with('notice', 'Your shopping cart is empty');
    }
}
