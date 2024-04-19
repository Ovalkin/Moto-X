<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($page = '', $code = '')
    {
        $returnData = array(
            'page' => $page,
            'code' => $code
        );
        $returnMainContent = new CategoryController();
        $returnMainContent = $returnMainContent->returnMainContent();

        if ($page == '') $returnData['mainContent'] = $returnMainContent;
        elseif ($page == 'motorcycles') $returnData['products'] = $returnMainContent['Мотоциклы'];
        elseif ($page == 'equipments') $returnData['products'] = $returnMainContent['Экипировка'];
        elseif ($page == 'accessories') $returnData['products'] = $returnMainContent['Аксессуары'];
        else return redirect()->to('/');

        return view('main', $returnData);
    }

    public function signIn(Request $request)
    {
        $userdata = $request->all();
        $signin = new User();
        $signin = $signin->signin($userdata);

        if ($signin) {
            if (isset($userdata['remember'])) $time = time() + 3600 * 60;
            else $time = time() + 3600;
        } else return "Логин или пароль неверные";

        setcookie('aut_user', serialize($signin), $time, "/");

        return redirect()->to('/');
    }

    public function signUp(Request $request)
    {
        $userdata = $request->all();
        unset($userdata['_token']);

        foreach ($userdata as $value) {
            if (empty($value)) dd($value);
        }
        if ($userdata['password'] === $userdata['rePassword']) {
            unset($userdata['rePassword']);
            $user = new User();
            if ($user->checkEmails($userdata['email'])) {
                if ($user->checkPhones($userdata['phone'])) {
                    $signinData['email'] = $userdata['email'];
                    $signinData['password'] = $userdata['password'];

                    $userdata['password'] = password_hash($userdata['password'], PASSWORD_DEFAULT);
                    $user->signup($userdata);

                    $signin = Request::create('/signin', 'POST', $signinData);
                    $this->signin($signin);

                    return redirect()->to('/');

                } else return "Аккаунт с таким номером телефона уже существует";
            } else return "Аккаунт с такой почтой уже существует";
        } else return "Пароли не совпадают";
    }

    public function signOut()
    {
        setcookie('aut_user', '', -3600, '/');
        return redirect()->to('/');
    }

    public function setting()
    {
        return view('setting');
    }

    public function changePass(Request $request)
    {
        $passwords = $request->all();

        $user = new User();
        $userData = $user->returnUserData();

        if (password_verify($passwords['nowPassword'], $userData['password'])) {
            $user->changePass($passwords['newPassword']);
            return redirect()->to('/setting');
        } else return "Текущий пароль неверный";
    }

    public function changeData(Request $request)
    {
        $data = $request->all();
        $updatedAt = date('Y-m-d H-i-s');
        $data['updated_at'] = $updatedAt;

        $user = new User();
        if ($user->changeData($data)) {
            return redirect()->to('/setting');
        } else return 'Ошибка';
    }

    public function orders()
    {
        $returnData = array();

        $order = new Order();
        $orders = $order->getOrdersForUser(unserialize($_COOKIE['aut_user']));

        $products = new CategoryController();
        $products = $products->returnMainContent();

        $ordersData = array();
        foreach ($products as $category){
            if ($category != null){
                foreach ($category as $product){
                    foreach ($orders as $item){
                        if ($product['id'] == $item['product_id']){
                            $ordersData[] = [
                                'id' => $item['id'],
                                'product_id' => $item['product_id'],
                                'name' => $product['name'],
                                'amount' => $item['amount'],
                                'address' => $item['address'],
                                'status' => $item['status'],
                            ];
                        }
                    }
                }
            }
        }
        $returnData['ordersData'] = $ordersData;

        return view('orders', $returnData);
    }
}
