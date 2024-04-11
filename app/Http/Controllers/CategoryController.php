<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Equipment;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function returnMainContent($products)
    {
        $accessories = new Accessory();
        $motorcycles = new Motorcycle();
        $equipments = new Equipment();
        $accessories = $accessories->getAccessoryData();
        $motorcycles = $motorcycles->getMotorcyclesData();
        $equipments = $equipments->getEquipmentsData();

        $returnMainContentData = array();
        foreach ($products as $product) {
            foreach ($accessories as $accessory) {
                if ($accessory['code'] == $product['code']) {
                    $returnMainContentData['Аксессуары'][$accessory['code']] = [
                        'page' => 'accessories',
                        'photo' => $accessory['photo'],
                        'code' => $accessory['code'],
                        'name' => $accessory['name'],
                        'params' => [
                            'Категория' => $accessory['category'],
                            'Производитель' => $accessory['producer']
                        ],
                        'price' => $product['price'],
                        'description' => $product['description']
                    ];
                }
            }
            foreach ($motorcycles as $motorcycle) {
                if ($motorcycle['code'] == $product['code']) {
                    $returnMainContentData['Мотоциклы'][$motorcycle['code']] = [
                        'page' => 'motorcycles',
                        'photo' => $motorcycle['photo'],
                        'code' => $motorcycle['code'],
                        'name' => $motorcycle['name'],
                        'params' => [
                            'Производитель' => $motorcycle['producer'],
                            'Год' => $motorcycle['year'],
                            'Ёмкость двигателя' => $motorcycle['capacity'],
                            'Класс' => $motorcycle['class']
                        ],
                        'price' => $product['price'],
                        'description' => $product['description']
                    ];
                }
            }
            foreach ($equipments as $equipment) {
                if ($equipment['code'] == $product['code']) {
                    $returnMainContentData['Экипировка'][$equipment['code']] = [
                        'page' => 'equipments',
                        'photo' => $equipment['photo'],
                        'code' => $equipment['code'],
                        'name' => $equipment['name'],
                        'params' => [
                            'Категория' => $equipment['category'],
                            'Производитель' => $equipment['producer'],
                            'Размер' => $equipment['size']
                        ],
                        'price' => $product['price'],
                        'description' => $product['description']
                    ];
                }
            }
        }


        return $returnMainContentData;
    }
}
