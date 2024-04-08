<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function addProduct($productData)
    {
        return Product::query()->insert($productData);
    }
    public function getProducts($category = '')
    {
        return Product::query()
            ->select('*')
            ->get()
            ->toArray();
    }
}
