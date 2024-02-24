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
            ->where('email', '=', $signinData['email'])->get();

        if (password_verify($signinData['password'], $user[0]['password'])) {
            return $user[0];
        } else return false;
    }

    public function signup($signupData): bool
    {
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
}
