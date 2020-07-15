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
        //dd($data2);

        $data3 = DB::table('products AS p')
                        ->select('p.*','b.name AS name_brand', 'b.slug AS slug_brand', 'b.logo')
                        ->join('brands AS b', 'p.brands_id', '=', 'b.id')
                        ->where('p.id', 1)
                        ->first();
        //dd($data3);
        $data4 = DB::table('products as p')
                        ->select('p.*', 'c.text_color','c.slug_color', 'c.price_color', 'c.id AS id_color')
                        ->join('product_color as pc', 'p.id','=', 'pc.products_id')
                        ->join('colors as c', 'pc.colors_id', '=', 'c.id')
                        ->where('p.id',1)
                        ->get();
        //dd($data4);
        /*
        $insert = DB::table('versions')->insert([
            'name' => '512 GB',
            'slug' => '512-gb',
            'price' => 40000000,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
        if($insert){
            dd('Thanh cong');
        } else {
            dd('That bai');
        }
        */
        /*
        $update = DB::table('versions')
                    ->where('id',6)
                    ->update([
                       'name' => '128 GB',
                       'slug' => '128-gb',
                       'price' => 24000000,
                       'updated_at' => date('Y-m-d H:i:s')
                    ]);
        if($update){
            dd('Thanh cong');
        } else {
            dd('That bai');
        }
        */
        /*
        $del = DB::table('versions')
                    ->where('id',6)
                    ->delete();
        if($del){
            dd('Thanh cong');
        } else {
            dd('That bai');
        }
        */
    }
}












