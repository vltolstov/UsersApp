<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{

    public function update(User $user, User $editedUser): bool
    {
        return $user->id === $editedUser->id;
    }

    public function delete(): bool
    {
        return true;
    }
}
