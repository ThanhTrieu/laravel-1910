<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandPost as BrandPost;
use Illuminate\Support\Str;
use App\Model\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $message = $request->session()->get('actionBrand');
        return view('admin.brand.index', compact('message'));
    }

    public function addBrand(Request $request)
    {
        $errLogo = $request->session()->get('errUploadBrand');
        return view('admin.brand.add', compact('errLogo'));
    }

    public function handleAddBrand(BrandPost $request, Brand $brand)
    {
        $nameBrand = $request->nameBrand;
        $slugBrand = Str::slug($nameBrand, '-');
        $desBrand = $request->descriptionBrand;

        //upload file laravel
        $upload = false;
        $nameFile = null;
        if($request->hasFile('logoBrand')){
            if($request->file('logoBrand')->isValid()){
                $file = $request->file('logoBrand');
                $nameFile = $file->getClientOriginalName();
                $upload = $file->move('uploads/images/brands', $nameFile);
            }
        }
        if($upload && $nameFile){
            // tien hanh insert du lieu vao db
            $dataInsert = [
                'name' => $nameBrand,
                'slug' => $slugBrand,
                'logo' => $nameFile,
                'description' => $desBrand,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ];
            $insert = $brand->insertDataBrand($dataInsert);
            if($insert){
                $request->session()->flash('actionBrand', 'Them thanh cong');
                return redirect()->route('admin.brand');
            } else {
                // loi - van o lai form add brand
                $request->session()->flash('actionBrand', 'Them that bai');
                return redirect()->route('admin.add.brand');
            }
        } else {
            // khong upload dc file
            $request->session()->flash('errUploadBrand', 'Khong upload duoc logo thuong hieu');
            return redirect()->route('admin.add.brand');
        }
    }
}
