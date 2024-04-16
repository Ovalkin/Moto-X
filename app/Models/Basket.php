<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'baskets';

    public function add($basketData)
    {
        return Basket::query()
            ->insert($basketData);
    }

    public function get($userId = '')
    {
        if ($userId != '')
            return Basket::query()
                ->select('*')
                ->where('user_id', '=', $userId)
                ->get()
                ->toArray();
        else
            return Basket::query()
                ->select('*')
                ->get()
                ->toArray();
    }

    public function upd($basketData)
    {
        Basket::query()
            ->where('id','=',$basketData['basketId'])
            ->update(['amount'=>$basketData['count']]);
    }

    public function del($id)
    {
        Basket::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
