<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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

        $file = $request->file('profile_picture');
        $extension = $file->getClientOriginalExtension();


        $uniqueId = Str::uuid()->toString();

        $fileName = $uniqueId . '.' . $extension;

        $dir = storage_path('uploads/profile_pictures');

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $file->storeAs('uploads/profile_pictures', $fileName);

        $requestData = $request->validated();
        $requestData['profile_picture'] = 'uploads/profile_pictures/' . $fileName;

        $result = $this->user->store($requestData);

        $response = [
            'message' => 'User successfully created',
            'data' => $result
        ];
        return response()->json($response, 200);
    }
}
