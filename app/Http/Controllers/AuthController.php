<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(readonly private UserRepositoryInterface $userRepository)
    {
    }

    public function login(AuthRequest $request): RedirectResponse
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect('registration')->with(['message' => 'Username or password incorrect']);
    }

    public function registrationForm(): View
    {
        return view('pages.registration');
    }

    public function register(RegistrRequest $request): RedirectResponse
    {
        $userData = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $this->userRepository->createUser($userData);

        return redirect('/');
    }

    public function logout(): RedirectResponse
    {
        session()->flush();
        Auth::logout();

        return redirect('/');
    }

    public function sendResetPasswordLink()
    {

    }
}
