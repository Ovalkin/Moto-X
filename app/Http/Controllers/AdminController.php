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
            $equipment = new Equipment();
            $equipment = $equipment->getEquipmentsData();
            $returnData['equipments'] = $equipment;
            $accessory = new Accessory();
            $accessory = $accessory->getAccessoryData();
            $returnData['accessories'] = $accessory;
        }
        return view('adminpanel', $returnData);
    }

    public
    function addProduct(Request $request)
    {
        $productData = $request->all();
        unset($productData['_token']);
        $productData['created_at'] = date('Y-m-d H-i-s');

        $addProduct = new Product();
        $addProduct->addProduct($productData);

        dd($request);
    }

    public
    function addMotorcycle(Request $request)
    {
        $motorcycleData = $request->all();
        unset($motorcycleData['_token']);

        $motorcycle = new Motorcycle();
        $motorcycles = $motorcycle->getMotorcyclesData();
        $lastMotorcycle = end($motorcycles);

        $motorcycleData['created_at'] = date('Y-m-d H-i-s');

        if (!$lastMotorcycle) $lastMotorcycle['id'] = 0;
        $motorcycleData['code'] = "МOT -" . $lastMotorcycle['id'] + 1;
        $motorcycleData['photo'] = $request->file('photo')
            ->store('/motorcycle/' . $lastMotorcycle['id'] + 1, 'public');

        $motorcycle->addMotorcycle($motorcycleData);


        dd($motorcycleData);
    }

    function addEquipment(Request $request)
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

    function addAccessory(Request $request)
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
}
