<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }
}
