<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrRequest;
use App\Services\UserRegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect('registration');
    }
    public function registrationForm()
    {
       return view('pages.registration');
    }
    public function register(RegistrRequest $request, UserRegisterService $registerService)
    {
        $registerService->register($request);

        return redirect('/');
    }
    public function logout(): RedirectResponse
    {
        session()->flush();
        Auth::logout();

        return redirect('/');
    }
}
