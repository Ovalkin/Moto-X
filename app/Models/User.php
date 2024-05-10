<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function signup($signupData): bool
    {
        $signupData['created_at'] = date('Y-m-d H-i-s');
        return User::query()->insert($signupData);
    }

    public function signin($signinData)
    {
        $user = User::query()
            ->select('*')
            ->where('email', '=', $signinData['email'])
            ->get()
            ->toArray();

        if (empty($user[0])) return false;
        else {
            if (password_verify($signinData['password'], $user[0]['password']))
                return $user[0]['id'];
            else
                return false;
        }
    }

    public function checkEmails($inputEmail): bool
    {
        $users = User::query()
            ->select('*')
            ->get()
            ->toArray();

        foreach ($users as $user) {
            if ($user['email'] == $inputEmail) {
                if ($user['id'] == unserialize($_COOKIE['aut_user'])) return true;
                return false;
            }
        }
        return true;
    }

    public function checkPhones($inputPhone): bool
    {
        $users = User::query()
            ->select('*')
            ->get()
            ->toArray();

        foreach ($users as $user) {
            if ($user['phone'] == $inputPhone) {
                if ($user['id'] == unserialize($_COOKIE['aut_user'])) return true;
                return false;
            }
        }
        return true;
    }

    public function returnUserData($id = ''): array|bool
    {
        if ($id == '') {
            if (empty($_COOKIE['aut_user'])) return false;
            $userId = unserialize($_COOKIE['aut_user']);
            $userData = User::query()
                ->select('*')
                ->where('id', '=', $userId)
                ->get()
                ->toArray();
            return $userData[0];
        }
        else {
            $userData = User::query()
                ->select('*')
                ->where('id', '=', $id)
                ->get()
                ->toArray();
            return $userData[0];
        }
    }

    public function changePass($newPass)
    {
        $userId = unserialize($_COOKIE['aut_user']);
        $updatedAt = date('Y-m-d H-i-s');
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);

        User::query()
            ->where('id', $userId)
            ->update(['password' => $newPass,
                'updated_at' => $updatedAt]);

        return true;
    }

    public function changeData($data)
    {
        $userId = unserialize($_COOKIE['aut_user']);
        unset($data['_token']);
        if (!$this->checkPhones($data['phone'])) return false;
        if (!$this->checkEmails($data['email'])) return false;

        User::query()
            ->where('id', $userId)
            ->update($data);

        return true;
    }
}
