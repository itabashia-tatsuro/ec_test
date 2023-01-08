<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('images')->insert([
                [
                    'image_name' => 'shoes001.png',
                    'product_id' => 1,
                ],
                [
                    'image_name' => 'shoes002.png',
                    'product_id' => 1,
                ],
                [
                    'image_name' => 'shoes003.png',
                    'product_id' => 1,
                ],
                [
                    'image_name' => 'shoes004.png',
                    'product_id' => 2,
                ],
                [
                    'image_name' => 'shoes005.jpeg',
                    'product_id' => 2,
                ],
                [
                    'image_name' => 'shoes006.png',
                    'product_id' => 3,
                ],
                [
                    'image_name' => 'cloth001.png',
                    'product_id' => 4,
                ],
                [
                    'image_name' => 'cloth002.png',
                    'product_id' => 4,
                ],
                [
                    'image_name' => 'hat001.png',
                    'product_id' => 6,
                ],
            ]);
        
    }
}
