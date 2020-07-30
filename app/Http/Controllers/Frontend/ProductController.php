<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        $title = "i phone 8 64GB";
        return view('frontend.product.detail', compact('title'));
    }
}
