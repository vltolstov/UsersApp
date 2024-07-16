<?php

namespace App\Http\Controllers\auth;

use App\Actions\UserLoginAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            return redirect(route('users.edit', Auth::user()->id));
        }

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        if ((new UserLoginAction())->login($request)) {
            return redirect(route('users.edit', Auth::user()->id));
        }

        return redirect(route('login'))->withErrors(['login-message' => __('messages.login-error')]);
    }

}
