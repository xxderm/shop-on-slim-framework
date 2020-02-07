<?php
namespace App\Auth;
use App\Models\User;
class Auth
{
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