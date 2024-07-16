<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;

class ForgotUserPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-user-password');
    }

    public function changePassword(ChangePasswordRequest $request, UserService $service)
    {
        $service->changeUserPassword($request->validated());
        return redirect(route('login'))->with('password-changed');
    }
}
