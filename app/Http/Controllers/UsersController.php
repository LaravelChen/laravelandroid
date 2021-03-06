<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])
        ) {
            $user = Auth::user();
            return response()->json([
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'followers' => $user->followers,
                    'following' => $user->following,
                    'created_at' => $user->created_at->toDateString(),
                    'api_token' => $user->api_token,
                    'introduction' => $user->introduction,
                    'avatar' => $user->avatar,
                    'sex' => $user->sex,
                    'birthday' => $user->birthday,
                ],
                'message' => true,
            ]);
        }

        return response()->json([
            'message' => false,
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => false,
                'type' => 'name',
                'info' => '用户名已存在'
            ]);
        }
        $validator2 = Validator::make($request->all(), [
            'email' => 'required|unique:users',
        ]);
        if ($validator2->fails()) {
            return response()->json([
                'message' => false,
                'type' => 'email',
                'info' => '邮箱已存在'
            ]);
        }
        $user = User::create(array_merge($request->all(), ["api_token" => str_random(60)]));
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
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => true,
        ]);
    }

    public function is_auth()
    {
        if (Auth::guard()) {
            $user = Auth::user();
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
        return response()->json([
            'message' => false,
        ]);
    }

    
    public function set_birthday(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->update([
            "birthday" => $request->get('birthday'),
        ]);
        return response()->json([
            "message" => true
        ]);
    }

    public function set_sex(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->update([
            "sex" => $request->get('sex'),
        ]);
        return response()->json([
            "message" => true
        ]);
    }

    public function set_info(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->update([
            "introduction" => $request->get('introduction'),
        ]);
        return response()->json([
            "message" => true
        ]);
    }

    public function set_name(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => false,
                'type' => 'name',
                'info' => '用户名已存在'
            ]);
        }
        $user = User::find($request->get('id'));
        $user->update([
            "name" => $request->get('name'),
        ]);
        return response()->json([
            "message" => true
        ]);
    }
}
