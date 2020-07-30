<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController;
use Illuminate\Http\Request;

class BrandController extends BaseController
{
    public function index()
    {
        return view('frontend.brand.index');
    }
}
