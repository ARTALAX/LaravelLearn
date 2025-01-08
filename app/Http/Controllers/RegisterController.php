<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required|max:20|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);
        User::query()->create($credentials);

        return redirect()->route('register.create')->with('success', 'profile created successfully');
    }
}
