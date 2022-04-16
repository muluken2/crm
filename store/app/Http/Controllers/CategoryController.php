<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Category;

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
}
