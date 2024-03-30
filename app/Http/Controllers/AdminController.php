<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index($page = '')
    {
        $userData = new User();
        $userData = $userData->returnUserData();

        if(!$userData['admin']) return redirect()->to('/');
        return view('adminpanel', ['page' => $page]);
    }

    public function addProduct()
    {

    }
}
