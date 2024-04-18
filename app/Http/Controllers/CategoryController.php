<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Equipment;
use App\Models\Motorcycle;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function returnMainContent()
    {
        $products = new Product();
        $products = $products->get();
        $accessories = new Accessory();
        $motorcycles = new Motorcycle();
        $equipments = new Equipment();
        $accessories = $accessories->getAccessoryData();
        $motorcycles = $motorcycles->getMotorcyclesData();
        $equipments = $equipments->getEquipmentsData();

        $returnMainContentData = array();

        if ($accessories == null) $returnMainContentData['Аксессуары'] = null;
        if ($equipments == null) $returnMainContentData['Экипировка'] = null;
        if ($motorcycles == null) $returnMainContentData['Мотоциклы'] = null;

        foreach ($products as $product) {
            foreach ($accessories as $accessory) {
                if ($accessory['code'] == $product['code']) {
                    $returnMainContentData['Аксессуары'][$accessory['code']] = [
                        'id' => $product['id'],
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
                        'id' => $product['id'],
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
                        'id' => $product['id'],
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
