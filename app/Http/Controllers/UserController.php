<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::all();

        return view('users', compact('users'));
    }
}
