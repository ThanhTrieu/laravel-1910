<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPost extends Model
{
    protected $table = 'product_posts';

    public function products()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
