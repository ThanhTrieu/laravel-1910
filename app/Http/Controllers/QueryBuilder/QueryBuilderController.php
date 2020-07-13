<?php

namespace App\Http\Controllers\QueryBuilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function index()
    {
        // SELECT * FROM `brands`;
        $data = DB::table('brands')->get();
        //dd($data);
        // SELECT a.`name`, a.`slug`, a.`logo` FROM `brand` AS a WHERE a.`id` = 1;
        $data2 = DB::table('brands AS a')
                    ->select('a.name','a.slug','a.logo')
                    ->where('a.id',1)
                    ->first(); // lay ra 1 row
        //dd($data2);

        $count = DB::table('products')->count();
        //dd($count); // trong bang products co bao nhieu dong du lieu
        $maxPrice = DB::table('colors')->max('price_color');
        $minPrice = DB::table('colors')->min('price_color');
        $avgPrice = DB::table('colors')->avg('price_color');
        //dd($maxPrice, $minPrice, $avgPrice);
        $dt = DB::table('products')->distinct()->get();
        //dd($dt);
        //SELECT a.`name`, a.`slug`, a.`logo` FROM `brand` AS a WHERE `a.name` = 'abc' OR `a.slug` = 'cde';
        $data2 = DB::table('brands AS a')
            ->select('a.name','a.slug','a.logo')
            ->where('a.name','=', 'abc')
            ->where('a.slug', 'cde')
            //->orWhere('a.slug', 'cde')
            ->get();
        dd($data2);
    }
}
