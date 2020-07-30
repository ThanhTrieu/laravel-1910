<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends BaseController
{
    public function index()
    {
        $today = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-30days'));
        $title = 'Home page';
        $newProduct = DB::table('products')
                        ->where('status_product',1)
                        ->whereBetween('created_at',[$yesterday, $today])
                        ->offset(0)
                        ->limit(8)
                        ->get();
        return view('frontend.home.index', compact('title','newProduct'));
    }
}
