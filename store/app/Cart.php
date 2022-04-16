<?php

namespace App;
use Illuminate\Support\Arr;
use Session;

class Cart 
{
    public $items = null;
    public $total_quantity = 0;
    public $total_price = 0;

     public function __construct($oldCart)
    {
       if($oldCart){
       	$this->items = $oldCart->items;
       	$this->total_price =$oldCart->total_price;
       	$this->total_quantity= $oldCart->total_quantity;
       } 
    }

    public function add($item, $id){
    	$storedItem = ['qty' =>0, 'item_price' => $item->item_price, 'item'=>$item];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['item_price'] = $item->item_price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->total_price += $item->item_price;
    	$this->total_quantity++;
    }


    public function substruct($item, $id){
      if($this->items[$id]['qty'] == 1){
        if(array_key_exists($id, $this->items)){
          $this->total_price = $this->total_price - ($item->item_price * $this->items[$id]['qty']);
          $this->total_quantity-= $this->items[$id]['qty'];
          $this->items[$id]['item_price'] = 0;
          $this->items[$id]['qty'] = 0;
          unset($this->items[$id]);
        }
        
      }else{
        $this->items[$id]['qty'] --;
      $this->items[$id]['item_price'] -=  $item->item_price;
      $this->total_price -= $item->item_price;
      $this->total_quantity--;
      }
      
    }
       public function substruct_all($item, $id){
        if(array_key_exists($id, $this->items)){
           $this->total_price = $this->total_price - ($item->item_price * $this->items[$id]['qty']);
          $this->total_quantity-= $this->items[$id]['qty'];
          $this->items[$id]['item_price'] = 0;
          $this->items[$id]['qty'] = 0;
          unset($this->items[$id]);
        }
      
    }
}
  