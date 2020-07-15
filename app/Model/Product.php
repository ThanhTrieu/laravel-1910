<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function brands()
    {
        return $this->belongsTo('App\model\Brand');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Model\Color','product_color','colors_id', 'products_id');
    }

    public function product_posts()
    {
        return $this->hasOne('App\Model\ProductPost','products_id', 'id');
    }
}
