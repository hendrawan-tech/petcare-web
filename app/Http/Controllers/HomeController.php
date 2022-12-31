<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Patient;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patients = Patient::all();
        $doctors = User::where('role_id', '2')->get();
        $articles = Article::all();
        $products = Product::all();
        return view('home', compact('patients', 'doctors', 'articles', 'products'));
    }
}
