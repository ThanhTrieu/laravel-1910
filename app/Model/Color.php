<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected  $fillable = ['text_color', 'slug_color', 'code_color', 'price_color', 'status','created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany('App\Model\Product','product_color','products_id', 'colors_id');
    }
}
