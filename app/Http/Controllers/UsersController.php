<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getusers()
    {
        return User::where('id', 1)->get();
    }

    public function insertusers(Request $request)
    {
        $user = User::create($request->all());
        if ($user) {
            return response()->json([
                'success' => true,
            ]);
        }
    }
}
