<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * @param User $user
     * 
     * @return User
     */
    public function creating(User $user): User
    {
        $user->password = bcrypt($user->password);
        
        return $user;
    }
}
