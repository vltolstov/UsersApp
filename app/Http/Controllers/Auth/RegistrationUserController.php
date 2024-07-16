<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationUserRequest;
use App\Services\UserService;

class RegistrationUserController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }

    public function store(RegistrationUserRequest $userData, UserService $service)
    {
        $service->createUser($userData->validated());
        return redirect(route('registration-success'));
    }
}
