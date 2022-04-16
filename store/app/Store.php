<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
       protected $fillable = [
        'item_name', 'item_price', 'category_id', 'description', 'item_image','item_status','user_id'
    ];

}
