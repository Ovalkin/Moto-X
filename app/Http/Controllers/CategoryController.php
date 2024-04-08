<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Equipment;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function returnMotorcycles($products)
    {
        $motorcycles = new Motorcycle();
        $motorcycles = $motorcycles->getMotorcyclesData();
        $returnMotorcycles = array();
        foreach ($products as $product) {
            foreach ($motorcycles as $motorcycle) {
                if ($motorcycle['code'] == $product['code']) {
                    $returnMotorcycles[] = array(
                        'photo' => $motorcycle['photo'],
                        'code' => $motorcycle['code'],
                        'name' => $motorcycle['name'],
                        'producer' => $motorcycle['producer'],
                        'year' => $motorcycle['year'],
                        'capacity' => $motorcycle['capacity'],
                        'class' => $motorcycle['class'],
                        'price' => $product['price']
                    );
                }
            }
        }
        return $returnMotorcycles;
    }

    public function returnEquipments($products)
    {
        $equipments = new Equipment();
        $equipments = $equipments->getEquipmentsData();
        $returnEquipments = array();
        foreach ($products as $product){
            foreach ($equipments as $equipment){
                if($equipment['code'] == $product['code']){
                    $returnEquipments[] = array(
                        'photo' => $equipment['photo'],
                        'code' => $equipment['code'],
                        'name' => $equipment['name'],
                        'category' => $equipment['category'],
                        'producer' => $equipment['producer'],
                        'size' => $equipment['size'],
                        'price' => $product['price']
                    );
                }
            }
        }
        return $returnEquipments;
    }
    public function returnAccessories($products)
    {
        $accessories = new Accessory();
        $accessories = $accessories->getAccessoryData();
        $returnAccessories = array();
        foreach ($products as $product){
            foreach ($accessories as $accessory){
                if($accessory['code'] == $product['code']){
                    $returnAccessories[] = array(
                        'photo' => $accessory['photo'],
                        'code' => $accessory['code'],
                        'name' => $accessory['name'],
                        'category' => $accessory['category'],
                        'producer' => $accessory['producer'],
                        'price' => $product['price']
                    );
                }
            }
        }
        return $returnAccessories;
    }
}
