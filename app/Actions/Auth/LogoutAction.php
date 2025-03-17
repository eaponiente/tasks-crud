<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LogoutAction
{
    /**
     * @param User $user
     * @return void
     */
    public function execute(User $user)
    {
        $user->currentAccessToken()->delete();
    }
}
