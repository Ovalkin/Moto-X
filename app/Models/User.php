<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function signin($signinData)
    {
        $user = User::query()->select('*')
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

    public function signup($signupData): bool
    {
        $signupData['created_at'] = date('Y-m-d H-i-s');
        return User::query()->insert($signupData);
    }

    public function checkEmails($inputEmail): bool
    {
        $emails = User::query()->pluck('email');
        foreach ($emails as $email) {
            if ($email == $inputEmail) return false;
        }
        return true;
    }

    public function checkPhones($inputPhone): bool
    {
        $phones = User::query()->pluck('phone');
        foreach ($phones as $phone) {
            if ($phone == $inputPhone) return false;
        }
        return true;
    }

    public function returnUserData(): array|bool
    {
        if (empty($_COOKIE['aut_user'])) return false;
        $userId = $_COOKIE['aut_user'];

        $userData = User::query()->select('*')
            ->where('id', '=', $userId)
            ->get()
            ->toArray();
        return $userData[0];
    }

    public function changePass($newPass)
    {
        $userId = $_COOKIE['aut_user'];
        $updatedAt = date('Y-m-d H-i-s');
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);

        $changePass = User::query()
            ->where('id', $userId)
            ->update(['password' => $newPass,
                'updated_at' => $updatedAt]);

        return true;
    }

    public function changeData($data)
    {
        $userId = $_COOKIE['aut_user'];
        unset($data['_token']);
        $changePass = User::query()
            ->where('id', $userId)
            ->update($data);

        return true;
    }
}
