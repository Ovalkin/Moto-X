<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $table = 'motorcycles';

    public function addMotorcycle($motorcycleData)
    {
        return Motorcycle::query()
            ->insert($motorcycleData);
    }

    public function getMotorcyclesData($code = '')
    {
        if ($code == '')
        return Motorcycle::query()
            ->select('*')
            ->get()
            ->toArray();
        else
            return Motorcycle::query()
                ->select('*')
                ->where('code', '=', $code)
                ->get()
                ->toArray()[0];
    }
    public function upd($id, $params)
    {
        return Motorcycle::query()
            ->where('id', '=', $id)
            ->update($params);
    }
    public function del($id)
    {
        Motorcycle::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
