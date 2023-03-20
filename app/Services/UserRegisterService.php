<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRegisterService
{
    public function register($request)
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        Auth::login($user);

        return redirect('/');
    }
}
