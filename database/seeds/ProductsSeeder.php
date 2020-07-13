<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++) {
            DB::table('products')->insert([
                'brands_id' => $i,
                'name_product' => Str::random(8),
                'slug_product' => Str::slug(Str::random(8), '-'),
                'price_product' => 1000 + $i,
                'image_product' => Str::random(4) . '.png',
                'qty_product' => 5,
                'status_product' => 1,
                'view_product' => 0,
                'sale_off' => 0,
                'hot_product' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
