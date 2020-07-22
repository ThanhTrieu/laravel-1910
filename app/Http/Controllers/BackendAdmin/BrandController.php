<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandPost as BrandPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model\Brand;
use voku\helper\AntiXSS;
use App\Http\Requests\EditBrandPost as EditBrand;

class BrandController extends Controller
{
    const LIMITED_ROWS = 2;

    public function index(Request $request, AntiXSS $antiXSS)
    {
        $message = $request->session()->get('actionBrand');
        $keyword = $request->keyword;
        $keyword = $antiXSS->xss_clean($keyword);
        $status = $request->status;
        $status = is_numeric($status) && ($status == '0' || $status == '1') ? $status : 1;

        // phan trang
        $listBrands= DB::table('brands')
                        ->where('status', $status)
                        ->where('name', 'like', "%{$keyword}%")
                        ->paginate(self::LIMITED_ROWS);

        return view('admin.brand.index', compact('message','listBrands', 'keyword', 'status'));
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

    public function deleteBrand(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        if($id === 0){
            echo "err";
        } else {
            $update = DB::table('brands')
                ->where('id', $id)
                ->update([
                    'status' => 0,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            if($update){
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function detail($slug, $id)
    {
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBrand = DB::table('brands')
                        ->where('id', $id)
                        ->first();
        if($infoBrand){
            return view('admin.brand.edit', compact('infoBrand'));
        } else {
            return view('admin.partials.not-found-page');
        }
    }

    public function handleEdit(EditBrand $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoBrand = DB::table('brands')
            ->where('id', $id)
            ->first();

        if($infoBrand) {
            $nameBrand = $request->nameBrand;
            $slugBrand = Str::slug($nameBrand, '-');
            $desBrand = $request->descriptionBrand;
            $logoBrand = $infoBrand->logo; // anh truoc khi thay doi
            $status = $request->statusBrand;

            $uploadLogo = null;
            $newLogo = null;
            if($request->hasFile('logoBrand')) {
                if ($request->file('logoBrand')->isValid()) {
                    $file = $request->file('logoBrand');
                    $newLogo = $file->getClientOriginalName();
                    $uploadLogo = $file->move('uploads/images/brands', $newLogo);
                }
            }
            if($uploadLogo && $newLogo){
                // xoa anh cu
                //unlink(public_path('uploads/images/brands') ."/".$logoBrand);
                $update = DB::table('brands')
                            ->where('id', $id)
                            ->update([
                                'name' => $nameBrand,
                                'slug' => $slugBrand,
                                'logo' => $newLogo,
                                'description' => $desBrand,
                                'status' => $status,
                                'updated_at' => date('Y-m-d H:i:s')
                            ]);
            } else {
                $update = DB::table('brands')
                    ->where('id', $id)
                    ->update([
                        'name' => $nameBrand,
                        'slug' => $slugBrand,
                        'logo' => $logoBrand,
                        'description' => $desBrand,
                        'status' => $status,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
            }
            if($update){
                $request->session()->flash('actionBrand', 'Update thanh cong');
                return redirect()->route('admin.brand');
            } else {
                $request->session()->flash('errUpdateBrand', 'Update that bai cong');
                return redirect()->route('admin.brand.detail',['slug' => $infoBrand->slug, 'id' => $id]);
            }
        } else {
            return view('admin.partials.not-found-page');
        }
    }
}
