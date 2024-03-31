<?php

namespace App\Http\Controllers;

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

        if(!$lastMotorcycle) $lastMotorcycle['id'] = 0;
        $motorcycleData['code'] = "М-" . $lastMotorcycle['id'] + 1;
        $motorcycleData['photo'] = $request->file('photo')
            ->store('/motorcycle/' . $lastMotorcycle['id'] + 1, 'public');

        $motorcycle->addMotorcycle($motorcycleData);


        dd($motorcycleData);
        return view('test', ['path' => $motorcycleData['photo']]);
    }
}
