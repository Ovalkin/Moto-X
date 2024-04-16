<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Equipment;
use App\Models\Motorcycle;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page = '')
    {
        $returnData = array(
            'page' => $page
        );
        $userData = new User();
        $userData = $userData->returnUserData();

        if (!$userData['admin']) return redirect()->to('/');
        if ($page == 'add-product') {
            $motorcycles = new Motorcycle();
            $motorcycles = $motorcycles->getMotorcyclesData();
            $returnData['motorcycles'] = $motorcycles;
            $equipments = new Equipment();
            $equipments = $equipments->getEquipmentsData();
            $returnData['equipments'] = $equipments;
            $accessory = new Accessory();
            $accessory = $accessory->getAccessoryData();
            $returnData['accessories'] = $accessory;
        }
        if ($page == 'edit-product') {
            $products = array();
            $categories = new CategoryController();
            $categories = $categories->returnMainContent();
            foreach ($categories as $category) {
                foreach ($category as $code) {
                    $products[] = $code;
                }
            }
            $returnData['products'] = $products;
        }
        return view('adminpanel', $returnData);
    }

    public function addProduct(Request $request)
    {
        $productData = $request->all();
        unset($productData['_token']);
        $productData['created_at'] = date('Y-m-d H-i-s');
        if ($productData['codeMotorcycles'] != null) $productData['code'] = $productData['codeMotorcycles'];
        if ($productData['codeEquipments'] != null) $productData['code'] = $productData['codeEquipments'];
        if ($productData['codeAccessories'] != null) $productData['code'] = $productData['codeAccessories'];
        unset($productData['codeMotorcycles'], $productData['codeEquipments'], $productData['codeAccessories']);
        $addProduct = new Product();
        $addProduct->addProduct($productData);

        dd($request);
    }

    public function addMotorcycle(Request $request)
    {
        $motorcycleData = $request->all();
        unset($motorcycleData['_token']);

        $motorcycle = new Motorcycle();
        $motorcycles = $motorcycle->getMotorcyclesData();
        $lastMotorcycle = end($motorcycles);

        $motorcycleData['created_at'] = date('Y-m-d H-i-s');

        if (!$lastMotorcycle) $lastMotorcycle['id'] = 0;
        $motorcycleData['code'] = "МOT-" . $lastMotorcycle['id'] + 1;
        $motorcycleData['photo'] = $request->file('photo')
            ->store('/motorcycle/' . $lastMotorcycle['id'] + 1, 'public');

        $motorcycle->addMotorcycle($motorcycleData);


        dd($motorcycleData);
    }

    public function addEquipment(Request $request)
    {
        $equipmentData = $request->all();
        unset($equipmentData['_token']);

        $equipment = new Equipment();
        $equipments = $equipment->getEquipmentsData();
        $lastEquipment = end($equipments);

        $equipmentData['created_at'] = date('Y-m-d H-i-s');
        if (!$lastEquipment) $lastEquipment['id'] = 0;
        $equipmentData['code'] = "EQ-" . $lastEquipment['id'] + 1;
        $equipmentData['photo'] = $request->file('photo')
            ->store('/equipment/' . $lastEquipment['id'] + 1, 'public');
        $equipment->addEquipment($equipmentData);
        dd($equipmentData);
    }

    public function addAccessory(Request $request)
    {
        $accessoryData = $request->all();
        unset($accessoryData['_token']);

        $accessory = new Accessory();
        $accessories = $accessory->getAccessoryData();
        $lastAccessory = end($accessories);

        $accessoryData['created_at'] = date('Y-m-d H-i-s');
        if (!$lastAccessory) $lastAccessory['id'] = 0;
        $accessoryData['code'] = "ACS-" . $lastAccessory['id'] + 1;
        $accessoryData['photo'] = $request->file('photo')
            ->store('/accessory/' . $lastAccessory['id'] + 1, 'public');
        $accessory->addAccessory($accessoryData);
        dd($accessoryData);
    }

    public function selectProduct(Request $request)
    {
        $id = $request->all()['idProduct'];
        $product = new Product();
        $product = $product->get($id);
        if ($product['category'] == 'motorcycle') {
            $motorcycle = new Motorcycle();
            $motorcycle = $motorcycle->getMotorcyclesData($product['code']);
            $product['photo'] = $motorcycle['photo'];
            $product['idCategory'] = $motorcycle['id'];
            $product['quantity'] = $motorcycle['quantity'];
            $product['name'] = $motorcycle['name'];
            $product['producer'] = $motorcycle['producer'];
            $product['params'] = [
                'Год' => $motorcycle['year'],
                'Ёмкость двигателя' => $motorcycle['capacity'],
                'Класс' => $motorcycle['class']
            ];
        }
        if ($product['category'] == 'equipment') {
            $equipment = new Equipment();
            $equipment = $equipment->getEquipmentsData($product['code']);
            $product['photo'] = $equipment['photo'];
            $product['idCategory'] = $equipment['id'];
            $product['quantity'] = $equipment['quantity'];
            $product['name'] = $equipment['name'];
            $product['producer'] = $equipment['producer'];
            $product['params'] = [
                'Категория' => $equipment['category'],
                'Размер' => $equipment['size']
            ];
        }
        if ($product['category'] == 'accessory') {
            $accessory = new Accessory();
            $accessory = $accessory->getAccessoryData($product['code']);
            $product['photo'] = $accessory['photo'];
            $product['idCategory'] = $accessory['id'];
            $product['quantity'] = $accessory['quantity'];
            $product['name'] = $accessory['name'];
            $product['producer'] = $accessory['producer'];
            $product['params'] = [
                'Категория' => $accessory['category']
            ];
        }
        unset($product['created_at']);
        unset($product['updated_at']);

        $returnData['page'] = 'edit-product';
        $returnData['product'] = $product;
        return view('adminpanel', $returnData);
    }

    public function editProduct(Request $request)
    {
        $productData = $request->all();
        $allProductParams = [
            'price' => $productData['price'],
            'description' => $productData['description'],
            'updated_at' => date('Y-m-d H-i-s')
        ];
        $categoryParams = [
            'name' => $productData['name'],
            'producer' => $productData['producer'],
            'updated_at' => date('Y-m-d H-i-s')
        ];

        $product = new Product();
        $product->upd($productData['idProduct'], $allProductParams);
        $category = '';

        if (isset($productData['photo'])) {
            $categoryParams['photo'] = $request
                ->file('photo')
                ->store('/' . $productData['category'] . '/' . $productData['idCategory'], 'public');
        }
        if ($productData['category'] == 'motorcycle') {
            $categoryParams['year'] = $productData['year'];
            $categoryParams['capacity'] = $productData['capacity'];
            $categoryParams['class'] = $productData['class'];
            $category = new  Motorcycle();
        } elseif ($productData['category'] == 'equipment') {
            $categoryParams['category'] = $productData['eqCategory'];
            $categoryParams['size'] = $productData['size'];
            $category = new Equipment();
        } elseif ($productData['category'] == 'accessory') {
            $categoryParams['category'] = $productData['acCategory'];
            $category = new Accessory();
        }
        $category->upd($productData['idCategory'], $categoryParams);

        if (isset($productData['delete'])) {
            $product->del($productData['idProduct']);
            $category->del($productData['idCategory']);
        }

        return redirect()->to('/adminpanel/edit-product');
    }

}
