<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(EditUserRequest $request, UserService $service)
    {
        $service->editUser($request->validated(), Auth::user()->id);
        return redirect(route('users.edit', Auth::user()->id));
    }

    public function destroy(User $user)
    {
        $user->delete();
        redirect(route('index'));
    }
}
