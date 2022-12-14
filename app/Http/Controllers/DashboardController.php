<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
        // ->except('index')
        //  ->only(['index', 'home', 'contatcs']) 
    // }

    public function index() {
        return view('admin.dashboard');
    }
}
