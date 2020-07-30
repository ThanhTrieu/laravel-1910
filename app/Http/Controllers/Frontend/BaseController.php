<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {
        $data = [];
        $route = Route::current();
        $data['slugBrand'] = $route->parameters['slug'] ?? null;
        $data['brands'] = Brand::where('status',1)->get();
        View::share('data', $data);
    }
}
