<?php

namespace App\Http\Controllers\Api\Arti;

use App\Http\Controllers\Controller;
use App\Models\Arti\ArtiUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'required|string|email|max:255|unique:arti_users',
            'password' => 'required|string|min:8',
            'gotra' => 'nullable|string|max:255',
            'rashi' => 'nullable|string|max:255',
        ]);

        $user = ArtiUser::create([
            'name' => $request->get('name', 'Seeker of Peace'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gotra' => $request->gotra,
            'rashi' => $request->rashi,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = ArtiUser::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Logged in successfully',
            'token' => $token,
            'user' => $user
        ]);
    }
}
