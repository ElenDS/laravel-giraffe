<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements Interfaces\UserRepositoryInterface
{
    public function createUser($data)
    {
        $user = new User();
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        Auth::login($user);
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function updateUser($data)
    {
        // TODO: Implement updateUser() method.
    }
}
