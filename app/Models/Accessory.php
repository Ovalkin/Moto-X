<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $table = 'accessories';

    public function addAccessory($accessoryData)
    {
        return Accessory::query()
            ->insert($accessoryData);
    }

    public function getAccessoryData($code = '')
    {
        if ($code == '')
            return Accessory::query()
                ->select('*')
                ->get()
                ->toArray();
        else
            return Accessory::query()
                ->select('*')
                ->where('code', '=', $code)
                ->get()
                ->toArray()[0];
    }
    public function upd($id, $params)
    {
        return Accessory::query()
            ->where('id', '=', $id)
            ->update($params);
    }
    public function del($id)
    {
        Accessory::query()
            ->where('id', '=', $id)
            ->delete();
    }
}
