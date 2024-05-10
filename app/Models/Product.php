<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function addProduct($productData)
    {
        return Product::query()
            ->insert($productData);
    }

    public function updateAmount($id, $amount)
    {
        $product = Product::query()
            ->select('*')
            ->where('id', '=', $id)
            ->get()
            ->toArray()[0];
        switch ($product['category']){
            case 'equipment':
                $products = new Equipment();
                $products = $products->getEquipmentsData($product['code']);
                $newAmount = $products['quantity'] - $amount;

                Equipment::query()
                    ->where('code', '=', $product['code'])
                    ->update(['quantity' => $newAmount]);
                break;
            case 'motorcycle':
                $products = new Motorcycle();
                $products = $products->getMotorcyclesData($product['code']);

                $newAmount = $products['quantity'] - $amount;

                Motorcycle::query()
                    ->where('code', '=', $product['code'])
                    ->update(['quantity' => $newAmount]);

                break;
            case 'accessory':
                $products = new Accessory();
                $products = $products->getAccessoryData($product['code']);

                $newAmount = $products['quantity'] - $amount;

                Accessory::query()
                    ->where('code', '=', $product['code'])
                    ->update(['quantity' => $newAmount]);

                break;
            default:
                break;
        }
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
