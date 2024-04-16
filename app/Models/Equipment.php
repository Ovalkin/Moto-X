<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    public function addEquipment($equipmentData)
    {
        return Equipment::query()
            ->insert($equipmentData);
    }

    public function getEquipmentsData($code = '')
    {
        if ($code == '')
            return Equipment::query()
                ->select('*')
                ->get()
                ->toArray();
        else
            return Equipment::query()
                ->select('*')
                ->where('code', '=', $code)
                ->get()
                ->toArray()[0];
    }
    public function upd($id, $params)
    {
        return Equipment::query()
            ->where('id', '=', $id)
            ->update($params);
    }
    public function del($id)
    {
        Equipment::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
