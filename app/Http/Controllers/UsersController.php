<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $is_login = Auth::attempt($request->all());
        if (is_null($is_login)) {
            return response()->json([
                'message' => false,
            ]);
        }
        $user=Auth::user();
        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'followers' => $user->followers,
                'following' => $user->following,
                'created_at' => $user->created_at->toDateString(),
            ],
            'message' => true,
        ]);
    }

    public function register(Request $request)
    {
        $user = User::create($request->all());
        if ($user) {
            return response()->json([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'followers' => $user->followers,
                    'following' => $user->following,
                    'created_at' => $user->created_at->toDateString(),
                ],
                'message' => true,
            ]);
        } else {
            return response()->json([
                'message' => false,
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => true,
        ]);
    }
}
