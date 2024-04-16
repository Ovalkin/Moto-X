<?php

namespace App\Http\Controllers;

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
        $products = new Product();
        $products = $products->get();
        $returnMainContent = new CategoryController();
        $returnMainContent = $returnMainContent->returnMainContent($products);

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
        foreach ($userdata as $value) {
            if (empty($value)) dd($value);
        }
        if ($userdata['password'] === $userdata['rePassword']) {
            unset($userdata['rePassword']);
            $user = new User();
            if ($user->checkEmails($userdata['email'])) {
                if ($user->checkPhones($userdata['phone'])) {

                    $signinData['_token'] = $userdata['_token'];
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
}
