<?php

namespace App\Http\Controllers\EloquentORM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Color;

class EloquentController extends Controller
{
    public function index()
    {
        $dt = Brand::find(1)->products;
        //dd($dt->toArray());

        $dt2 = Product::find(1)->brands;
        //dd($dt2->toArray());

        $dt3 = Product::find(1)->colors()->get();
        //dd($dt3->toArray());

        $dt4 = Color::find(1)->products()->get();
        //dd($dt4->toArray());

        $dt5 = Product::find(1)->product_posts;
        /*
        if($dt5){
            dd($dt5->toArray());
        } else {
            dd('Khong co du lieu');
        }
        */
        /******** Mo so lenh co ban Eloquent orm ************/
        //DB::table('products')->get();
        $test = Product::all();
        //dd($test->toArray());
        $count = Color::count();
        //dd($count);
        $info = Brand::select('*')->where('id',1)->first();
        dd($info->toArray());

    }
}
