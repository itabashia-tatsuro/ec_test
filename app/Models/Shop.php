<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Shop extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasMany(Product::class, 'shop_id'); // １店舗につき複数商品
    }
}
