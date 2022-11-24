<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return 'index';
    }

    public function show($id = 0) {
        return "Show: $id";
    }
}
