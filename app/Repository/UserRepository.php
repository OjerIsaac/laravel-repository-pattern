<?php

namespace App\Repository;

use App\Models\User;

use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function store($data)
    {
        return User::create($data);
    }

    public function exists($email)
    {
        return User::where('email', $email)->exists();
    }
}
