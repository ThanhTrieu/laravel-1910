<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // quy uoc model nay lam viec voi bang du lieu nao
    protected $table = 'brands';

    // cho phep lam viec voi cac cot trong db
    protected  $fillable = ['name','slug','logo','description','status','created_at','updated_at'];

    // viet 1 ham dinh nghia moi quan he 1-N voi bang products
    public function products()
    {
        //products : ten ham do LTV tu dinh nghia - thong thuong hay dat trung ten bang cho y nghia va de hieu
        return $this->hasMany('App\Model\Product','brands_id', 'id');
    }

    public function insertDataBrand($dataBrand)
    {
        return Brand::create($dataBrand);
    }
}
