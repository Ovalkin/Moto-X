<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function add($orderData)
    {
        return Order::query()
            ->insert($orderData);
    }

    public function getOrdersForUser($id)
    {
        return Order::query()
            ->select('*')
            ->where('user_id', '=', $id)
            ->get()
            ->toArray();
    }

    public function getOrders()
    {
        return Order::query()
            ->select('*')
            ->get()
            ->toArray();
    }

    public function acceptOrder($id, $productId, $amount)
    {
        $product = new Product();
        $product->updateAmount($productId, $amount);

        return Order::query()
            ->where('id', '=', $id)
            ->update(['status' => 'Принят']);
    }

    public function rejectOrder($id)
    {
        return Order::query()
            ->where('id', '=', $id)
            ->update(['status' => 'Отклонён']);
    }
}
