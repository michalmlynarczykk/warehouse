<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request): string
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'password',
        ]);
        return "Hello";
    }
}
