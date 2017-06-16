<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getusers()
    {
        return User::where('id',1)->get();
    }
}
