<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Version;
use App\Model\Color;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function add()
    {
        $brands = Brand::where('status',1)->get();
        $versions = Version::where('status',1)->get();
        $colors = Color::where('status',1)->get();
        return view('admin.product.add', compact('brands','versions','colors'));
    }

    public function handleAdd(Request $request)
    {
        $arrImages = [];
        if($request->hasFile('images')){
            $image = $request->file('images');
            foreach ($image as $key => $i) {
                if($i->isValid()){
                    $nameImage = $i->getClientOriginalName();
                    $i->move('uploads/images/products',$nameImage);
                    $arrImages[] = $nameImage;
                }
            }
        }
        $imageProduct = array_pop($arrImages);
        // $imageProduct : insert vao bang product
        // $arrImages: insert vao bang image_product
        // dd($imageProduct, $arrImages);
        // 1 - insert vao bang product - lay ra id vua insert
        // 2 + 3 insert vao bang product_color hoac product_version neu co
        // 4 insert vao bang image_product
        // 5 insert vao bang post_product
        // 6 insert vao bang property_product
    }
}
