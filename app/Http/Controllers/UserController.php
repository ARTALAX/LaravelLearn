<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = Cache::remember('users:all', 3600, function () {
            return User::all();
        });
        dd($users->pluck('name'));
        $users = User::all();

        return view('users', compact('users'));
    }

    public function show($id)
    {
        $users = Cache::get('users:'.$id);
        dd($users->pluck('name'));

    }
}
