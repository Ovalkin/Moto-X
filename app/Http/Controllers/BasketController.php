<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Basket;
use App\Models\Equipment;
use App\Models\Motorcycle;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $returnData = [

        ];
        $basket = new Basket();
        if (isset($_COOKIE['aut_user'])) $basket = $basket->get(unserialize($_COOKIE['aut_user']));
        else return redirect()->to('/');
        $products = new Product();
        $returnData['sumPrice'] = 0;
        $returnData['countProduct'] = 0;

        $basketData = array();
        foreach ($basket as $item) {
            $product = $products->get($item['product_id']);
            $nameProduct = '';
            $photoProduct = '';
            if ($product['category'] == 'motorcycle') {
                $motorcycle = new Motorcycle();
                $motorcycle = $motorcycle->getMotorcyclesData($product['code']);
                $nameProduct = $motorcycle['name'];
                $photoProduct = $motorcycle['photo'];
            }
            if ($product['category'] == 'accessory') {
                $accessory = new Accessory();
                $accessory = $accessory->getAccessoryData($product['code']);
                $nameProduct = $accessory['name'];
                $photoProduct = $accessory['photo'];
            }
            if ($product['category'] == 'equipment') {
                $equipment = new Equipment();
                $equipment = $equipment->getEquipmentsData($product['code']);
                $nameProduct = $equipment['name'];
                $photoProduct = $equipment['photo'];
            }
            $basketData[] = [
                'id' => $item['id'],
                'photo' => $photoProduct,
                'name' => $nameProduct,
                'code' => $product['code'],
                'price' => $product['price'],
                'amount' => $item['amount']
            ];
            $returnData['countProduct']++;
            $returnData['sumPrice'] += $product['price'] * $item['amount'];
        }
        $returnData['basketData'] = $basketData;
        return view('basketPage', $returnData);
    }

    public function addProduct(Request $request)
    {
        $basketData = $request->all();
        unset($basketData['_token']);
        $basketData['user_id'] = unserialize($_COOKIE['aut_user']);
        $basketData['amount'] = 1;
        $basket = new Basket();
        $basket->add($basketData);
        dd($basketData);
    }

    public function update(Request $request)
    {
        $basketData = $request->all();
        if ($basketData['action'] == '+') {
            $basketData['count'] += 1;
        } elseif ($basketData['action'] == '-') {
            $basketData['count'] -= 1;
        }
        $basket = new Basket();
        $basket->upd($basketData);
        return redirect()->to('/basket');
    }

    public function delete(Request $request)
    {
        $id = $request->all()['id'];
        $basket = new Basket();
        $basket->del($id);
        return redirect()->to('/basket');
    }

    public function makeOrder(Request $request)
    {
        $orderData = $request->all();
        $order = new Order();

        $basket = new Basket();
        $baskets = $basket->get(unserialize($_COOKIE['aut_user']));

        $orders = [];
        foreach ($baskets as $product){
            $orders[] = [
                'user_id' => $product['user_id'],
                'product_id' => $product['product_id'],
                'amount' => $product['amount'],
                'address' => $orderData['address'],
                'status' => 'На рассмотрении',
                'created_at' => date('Y-m-d H-i-s')
            ];
            $basket->del($product['id']);
        }
        foreach ($orders as $value){
            $order->add($value);
        }
        dd($orders);
    }
}
