<?php

namespace App\Repository;

use App\Models\User;

use App\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{   

    public function store($data = [] )
    {   
        //store the user
        dd($data);
    }
    
}