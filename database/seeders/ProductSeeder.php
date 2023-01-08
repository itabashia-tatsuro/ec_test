<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'shop_id' => 1,
                'category_id' => 1,
                'product_name' => '靴-1',
                'information' => '靴-1です',
                'price' => 1000,
                'stock' => 10,
                'is_selling' => 0,
            ],
            [
                'shop_id' => 1,
                'category_id' => 1,
                'product_name' => '靴-2',
                'information' => '靴-2です',
                'price' => 1500,
                'stock' => 10,
                'is_selling' => 0,
            ],
            [
                'shop_id' => 1,
                'category_id' => 1,
                'product_name' => '靴-3',
                'information' => '靴-3です',
                'price' => 2000,
                'stock' => 10,
                'is_selling' => 0,
            ],
            [
                'shop_id' => 1,
                'category_id' => 2,
                'product_name' => '服-1',
                'information' => '服-1です',
                'price' => 3000,
                'stock' => 10,
                'is_selling' => 0,
            ],
            [
                'shop_id' => 1,
                'category_id' => 2,
                'product_name' => '服-2',
                'information' => '服-2です',
                'price' => 3500,
                'stock' => 10,
                'is_selling' => 0,
            ],
            [
                'shop_id' => 1,
                'category_id' => 3,
                'product_name' => '帽子-1',
                'information' => '帽子-1です',
                'price' => 2500,
                'stock' => 10,
                'is_selling' => 0,
            ],
        ]);
    }
}
