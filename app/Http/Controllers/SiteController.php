<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Gate;


class SiteController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('site.home', compact('products'));
    }

    public function details($slug) {
        $product = Product::where('slug', $slug)->first();

        // Gate::authorize('see-product', $product);
        // $this->authorize('seeProduct', $product);

        // if(Gate::allows('see-product', $product)) {
        //     return view('site.details', compact('product')); 
        // }

        // if(Gate::denies('see-product', $product)) {
        //     return redirect()->route('site.index');
        // }

        if(auth()->user()->can('seeProduct', $product)) {
            return view('site.details', compact('product')); 
        }

        if(auth()->user()->cannot('see-product', $product)) {
            return redirect()->route('site.index');
        }

    }
    
    public function category($id) {
        $products = Product::where('id_category', $id)->paginate(3);
        $category = Category::find($id);
        return view('site.category', compact('products', 'category'));
    }
}
