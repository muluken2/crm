<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Category;
use App\Store;
use Auth;

class CategoryController extends Controller
{
    public function create(){
    	  $categories = Category::latest()->get();
    	return view("category.category_create", compact('categories'));
    }

    public function store(Request $request)
    {

         Category::updateOrCreate(['id' => $request->category_id],
                ['category_name' => $request->category_name ]); 
                $categories = Category::latest()->get();
                 return view("category.category_create", compact('categories'))->with('message', 'Category created/updated successfuly!'); 

    }
    public function category($id){
       if(Auth::check()){
        $products = Store::join('categories', 'stores.category_id', '=', 'categories.id')
                              ->where('categories.id', $id)
                              ->select('stores.*', 'categories.category_name  AS cname')
                              ->where('stores.user_id', '!=', Auth::user()->id)
                              ->where('status', true)
                              ->get();
       }else{
        $products = Store::join('categories', 'stores.category_id', '=', 'categories.id')
                              ->where('categories.id', $id)
                              ->select('stores.*', 'categories.category_name  AS cname')
                              ->where('status', true)
                              ->get();
       }
        

        $categories = Category::get();

        return view('home', compact('products', 'categories', 'id'));
    }
}
