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

    public function getMotorcyclesData()
    {
        return Motorcycle::query()
            ->select('*')
            ->get()
            ->toArray();
    }
}
