<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Stock;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'information',
        'category_id',
        'shop_id',
        'price',
        'sort_order',
        'is_selling',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // １商品につき１カテゴリー
    }

    public function images()
    {
        return $this->hasMany(Image::class); // １商品につき複数画像（最大3枚）
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class); // 1つの商品につき1つの店舗 ※基本は複数店舗
    }

    public function stock()
    {
        return $this->hasMany(Stock::class); // １商品につき複数在庫
    }
}
