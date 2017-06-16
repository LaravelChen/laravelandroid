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
        ]);
        if ($user) {
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
