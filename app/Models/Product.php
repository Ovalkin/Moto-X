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
        return Product::query()
            ->insert($productData);
    }

    public function get($id = '')
    {
        if ($id != '')
            return Product::query()
                ->select('*')
                ->where('id', '=', $id)
                ->get()
                ->toArray()[0];
        else
            return Product::query()
                ->select('*')
                ->get()
                ->toArray();
    }
    public function upd($id, $params)
    {
        return Product::query()
            ->where('id', '=', $id)
            ->update($params);
    }
    public function del($id)
    {
        Product::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
