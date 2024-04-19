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
}
