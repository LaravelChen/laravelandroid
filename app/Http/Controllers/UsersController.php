<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function getusers()
    {
        return User::where('id', 1)->get();
    }

    public function insertusers()
    {
        $user = User::create([
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'followers'=>0,
            'following'=>0,
        ]);
        if ($user) {
            return response()->json([
                'info' => '成功',
            ]);
        }else{
            return response()->json([
                'info' => '失败',
            ]);
        }
    }
}
