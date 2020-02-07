<?php
namespace App\Auth;
use App\Models\User;
class Auth
{
    public function user()
    {
        return User::find($_SESSION['user']['id']);
    }
    public function check()
    {
        return isset($_SESSION['user']);
    }
    public function attempt($email, $password)
    {
        $user = User::where('Email', $email)->first();
        if(!$user)
            return false;
        if(password_verify($password, $user->Password))
        {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}