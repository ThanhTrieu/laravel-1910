<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('colors')->insert([
                'text_color' => Str::random(5),
                'slug_color' => Str::slug(Str::random(5), '-'),
                'code_color' => '#'.Str::random(5),
                'price_color' => (100 + $i),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
