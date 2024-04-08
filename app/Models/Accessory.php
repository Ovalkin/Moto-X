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

    public function getAccessoryData()
    {
        return Accessory::query()
            ->select('*')
            ->get()
            ->toArray();
    }
}
