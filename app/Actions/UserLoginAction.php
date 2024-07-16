<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    public function login($request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data, remember: true)) {
            $request->session()->regenerate();
            return true;
        }

        return false;
    }
}
