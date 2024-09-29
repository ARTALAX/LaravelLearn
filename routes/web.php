<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello');
});
Route::get('/login', function () {
    return view('Login');
});
Route::get('/register', function () {
    return view('Register');
});
Route::get('/posts', function () {
    return view('posts');
});
Route::get('/logout', function () {
    return view('logout');
});

