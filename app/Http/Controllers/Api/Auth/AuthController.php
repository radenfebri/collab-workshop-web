<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ], [
                'username.required' => 'The username field is required.',
                'password.required' => 'The password field is required.',
            ]);


            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'error' => $validator->errors(),
                ], 401);
            }

            if (!Auth::attempt($request->only('username', 'password'))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Username and Password does not match with our records',
                ], 401);
            }

            $user = User::where('username', $request->username)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user' => $user,
                'token' => $user->createToken("api_token")->plainTextToken,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // REGISTER
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:20|min:4',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|max:20|min:4|unique:users,username',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $response = [
                    "status" => false,
                    "message" => "Validation Error",
                    "error" => $errors->toArray()
                ];
                return response()->json($response, 422);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'role' => 'User',
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => true,
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'role' => 'User',
                    'message' => 'User Created Successfully',
                ],
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    // GET USER
    public function show()
    {
        try {
            $user = auth()->user();

            return response()->json([
                'status' => true,
                'message' => 'User Login Details',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    // REFRESH TOKEN
    public function refreshToken(Request $request)
    {
        try {
            $user = $request->user();
            $user->tokens->each(function ($token) {
                $token->delete();
            });
            $token = $user->createToken('api_token')->plainTextToken;

            return response()->json(['access_token' => $token], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json([
                'message' => 'logout success'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
