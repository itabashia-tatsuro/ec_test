<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'name' => 'サンプルECサイト',
            'admin_id' => 1, // この数字は、adminsテーブルの中身に合わせて任意でお願いします
            'information' => '素晴らしい商品を取り扱っています', // 文言はご自身で考えて下さい
            'created_at' => Carbon::now()
        ]);
        // 画像はいったん空欄にします。のちほど実装します
    }
}
