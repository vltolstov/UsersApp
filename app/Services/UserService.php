<?php

namespace App\Services;

use App\Jobs\PasswordChangeJob;
use App\Jobs\UserEditJob;
use App\Jobs\UserRegistrationJob;
use App\Mail\PasswordChanged;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class UserService
{
    public function createUser(array $userData)
    {
        dispatch(new UserRegistrationJob($userData));
        Mail::to($userData['email'])->queue(new UserRegistered());
    }

    public function editUser(array $userData, int $userId)
    {
        dispatch_sync(new UserEditJob($userData, $userId));
    }

    public function changeUserPassword(array $userData)
    {
        $password = uniqid();
        dispatch_sync(new PasswordChangeJob($userData['email'], $password));
        Mail::to($userData['email'])->queue(new PasswordChanged($password));
    }

}
