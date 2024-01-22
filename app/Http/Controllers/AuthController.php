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
        if ($this->user->exists($request->email)) {
            $response = [
                'message' => 'User with the provided email already exists.',
            ];
            return response()->json($response, 400);
        }

        $result = $this->user->store($request->validated());

        $response = [
            'message' => 'User successfully created',
            'data' => $result
        ];
        return response()->json($response, 200);
    }
}
