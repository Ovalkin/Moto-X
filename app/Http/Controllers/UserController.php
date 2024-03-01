<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        $user = $user->returnUserData();

        $page = request()->route()->uri();
        return view('main', ['page' => $page, 'userData' => $user]);
    }

    public function signIn(Request $request)
    {
        $userdata = $request->all();
        $signin = new User();
        $signin = $signin->signin($userdata);
        if ($signin) {
            if (isset($userdata['remember'])) {
                setcookie('aut_user', serialize($signin), time() + 3600 * 100, "/");
                return redirect()->to('/');
            }
            setcookie('aut_user', serialize($signin), time() + 3600, "/");
            return redirect()->to('/');
        } else return "Логин или пароль неверные";
    }

    public function signUp(Request $request)
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
        $user = new User();
        $user = $user->returnUserData();
        return view('setting', ['userData' => $user]);
    }
}
