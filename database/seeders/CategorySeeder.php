<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name' => '靴',
            ],
            [
                'category_name' => '服',
            ],
            [
                'category_name' => '帽子',
            ],
        ]);
    }
}
