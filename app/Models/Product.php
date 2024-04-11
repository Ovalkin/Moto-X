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
    public function get($code = '')
    {
        if ($code != '')
            return Product::query()
                ->select('*')
                ->where('code', '=', $code)
                ->get()
                ->toArray();
        else
            return Product::query()
            ->select('*')
            ->get()
            ->toArray();
    }
}
