<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request): string
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('welcome'));
//            return view('welcome');
        }
        return redirect(route('register'))->with("error", "login credentials not valid");

    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required']
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = "USER";

        $user = User::create($data);

        if (!$user) {
            return redirect(route('register'))->with("error", "Registration failed");
        }

        return redirect(route('login'))->with("success", "Registration successful, please log in");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with("success", "You have logged out successfully");
    }

    public function welcome()
    {
        return view('welcome');
    }
}
