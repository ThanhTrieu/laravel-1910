<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController;
use Illuminate\Http\Request;

class CheckOutController extends BaseController
{
    public function index()
    {
        return view('frontend.checkout.index');
    }
}
