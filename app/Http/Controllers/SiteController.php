<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SiteController extends Controller
{
    public function index()
    {
        // return 'Index';

        $products = Product::paginate(3);

        return view('site.home', compact('products'));
    }

    public function details($slug) {
        $product = Product::where('slug', $slug)->first();

        return view('site.details', compact('product'));
    }
}
