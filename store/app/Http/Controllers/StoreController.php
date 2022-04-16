<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Category;
use App\Store;
use App\Cart;
use Session;
use Auth;

class StoreController extends Controller
{
     public function create(){
     	$catagories = Category::get();
    	return view("store.item_create", compact('catagories'));
    }

    public function store_item(){
         $products = Store::join('categories', 'stores.category_id', '=', 'categories.id')
                              ->select('stores.*', 'categories.category_name  AS item_category')
                              ->latest()->get();
                              
        return view("store.store_item", compact('products'));
    }
    public function store(Request $request)
    {
    	request()->validate([
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       if ($files = $request->file('item_image')) {
           $destinationPath = public_path('/item_image/'); 
           $item_image = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $item_image);
 
            Store::updateOrCreate(['id' => $request->store_id],
                [ 'item_name' => $request->item_name, 
                  'item_price' => $request->item_price, 
             	    'category_id' => $request->category_id,
                  'user_id' => $request->user_id, 
         		      'description' => $request->description, 
         	        'item_image' => $item_image]);
        }
       
      return redirect()->back()->with('message', 'Category created/updated successfuly!'); 

    }
    public function getAddTocart(Request $request, $id){
        if(!Auth::user()){
            return view("Auth.login");
        }

    	$product = Store::find($id);
    	$oldCart = Session::has('cart')? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	//dd($request->session()->get('cart'));
    	return redirect()->route('index');

    }
    public function shopping_cart(){
    	if(!Session::has('cart')){
    		return view('shope.shopping_cart');
    	}

    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shope.shopping_cart', ['products'=>$cart->items, 'total_price'=> $cart->total_price]);
    }
    public function checkout(){
    	if(!Session::has('cart')){
    		return view('shope.shopping_cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->total_price;
		return view('shope.checkout', ['total'=> $total]);
    }

   public function destroy(Request $request, $id){
        if(!Session::has('cart')){
            return view('shope.shopping_cart');
        }
        $product = Store::find($id);
        $oldCart = Session::has('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->substruct($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->back()->with('message', 'One Item reduce successfully');
    }

   public function destroy_all(Request $request, $id){
        if(!Session::has('cart')){
            return view('shope.shopping_cart');
        }
        $product = Store::find($id);
        $oldCart = Session::has('cart')? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->substruct_all($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->back()->with('message', 'All Item reduce successfully');
    }

    public function store_deactive($id){
       $store = Store::find($id);
       $store->status = 0;
       $store->save();

       return redirect()->back()->with('message', 'Deactivate successfully');
    }
    public function store_delete($id){
        Store::find($id)->delete();

        return redirect()->back()->with('message', 'Delete successfully');
    }

}
