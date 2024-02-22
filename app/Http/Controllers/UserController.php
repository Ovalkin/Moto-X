<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function signin()
    {

    }
    public function signup(Request $request)
    {
        dd($request->post());
    }
}
