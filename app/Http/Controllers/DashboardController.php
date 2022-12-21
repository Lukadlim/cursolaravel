<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use DB;

class DashboardController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // ->except('index')
    //  ->only(['index', 'home', 'contatcs']) 
    // }

    public function index()
    {
        $users = User::all()->count();

        // Graphic 1 - users
        $usersData = User::select([
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as total'),
        ])
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // Prepare arrays
        foreach ($usersData as $user) {
            $year[] = $user->year;
            $total[] = $user->total;
        }

        // chartjs format
        $userLabel = "' Registered users comparative '";
        $userYear = implode(',', $year);
        $userTotal = implode(',', $total);

        // graphic 2 - categories
        $catData = Category::with('products')->get();

        // prepare array
        foreach($catData as $cat) {
            $catName[] = "'" .$cat->name.  "'";
            $catTotal[] = $cat->products->count();
        }

        // chartjs format
        $catLabel = implode(',', $catName);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('users', 'userLabel', 'userYear', 'userTotal', 'catLabel', 'catTotal'));
    }
}
