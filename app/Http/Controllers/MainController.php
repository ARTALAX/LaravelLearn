<?php

namespace App\Http\Controllers;

use App\Models\Book;

class MainController extends Controller
{
    public function index()
    {
        $books = Book::query()->orderBy('created_at', 'desc')->get();

        return view('index', compact('books'));
    }
}
