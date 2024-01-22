<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Repository\UserRepositoryInterface;

class AuthController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function store(RegisterRequest $request)
    {   
        //store  user
        $this->user->store($request);
    }
}
