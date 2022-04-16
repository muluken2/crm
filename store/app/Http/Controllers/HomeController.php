<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Cart;
use App\User;
use App\Role;
use App\Category;

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
       
     $products = Store::join('categories', 'stores.category_id', '=', 'categories.id')
                              ->select('stores.*', 'categories.category_name  AS cname')
                              ->get();
        $user = User::count();
        $role = Role::count();
        $category = Category::count();
        $store = Store::count();
        return view('index', compact('products', 'user', 'role', 'category', 'store'));
    }
}
