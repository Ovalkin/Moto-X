<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function signin(Request $request)
    {
        $userdata = $request->all();
        $signin = new User();
        $signin = $signin->signin($userdata);

        if($signin){
            if(isset($userdata['remember'])){
                setcookie('autUser', serialize($signin), time()+3600*100);
                return redirect()->to('/');
            }
            setcookie('autUser', serialize($signin));
            return redirect()->to('/');
        }
        else return "Логин или пароль неверные";
    }

    public function signup(Request $request)
    {
        $userdata = $request->all();

        foreach ($userdata as $value) {
            if (empty($value)) dd($value);
        }

        if ($userdata['password'] === $userdata['rePassword']) {
            $user = new User();
            if ($user->checkEmails($userdata['email'])) {
                if ($user->checkPhones($userdata['phone'])) {

                    unset($userdata['rePassword']);
                    $userdata['password'] = password_hash($userdata['password'], PASSWORD_DEFAULT);
                    $user->signup($userdata);
                    return redirect()->to('/');

                } else return "Аккаунт с таким номером телефона уже существует";
            } else return "Аккаунт с такой почтой уже существует";
        } else return "Пароли не совпадают";
    }
}
