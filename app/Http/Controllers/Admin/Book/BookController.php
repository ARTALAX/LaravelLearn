<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['authors', 'publisher'])
            ->latest('updated_at')
            ->paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('admin.books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'img' => 'nullable|image|max:4096',
        ]);

        // Генерация slug
        $validatedData['slug'] = Str::slug($validatedData['title']);

        // Обработка изображения
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('books', 'public');
            $validatedData['img'] = $imagePath;
        } else {
            $validatedData['img'] = null;
        }

        // Создание книги
        $book = Book::create([
            'title' => $validatedData['title'],
            'publisher_id' => $validatedData['publisher_id'],
            'year' => $validatedData['year'],
            'img' => $validatedData['img'],
            'slug' => $validatedData['slug'],
        ]);

        // Привязываем авторов через промежуточную таблицу
        $book->authors()->sync($validatedData['author_ids']);

        return redirect()->route('admin.books.index')
            ->with('success', 'Книга успешно добавлена!');
    }

    public function show(string $id)
    {
        $book = Book::with(['authors', 'publisher'])
            ->findOrFail($id);

        return view('admin.books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::with(['authors', 'publisher'])->findOrFail($id);
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('admin.books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'img' => 'nullable|image|max:4096',
        ]);

        $book = Book::findOrFail($id);

        // Обновление изображения
        if ($request->hasFile('img')) {
            // Удаляем старое изображение
            if ($book->img && Storage::exists('public/'.$book->img)) {
                Storage::delete('public/'.$book->img);
            }

            $imagePath = $request->file('img')->store('books', 'public');
            $book->img = $imagePath;
        }

        // Обновляем данные книги
        $book->update([
            'title' => $validated['title'],
            'publisher_id' => $validated['publisher_id'],
            'year' => $validated['year'],
            'img' => $book->img,
            'slug' => Str::slug($validated['title']),
            
        ]);

        // Синхронизация авторов
        $book->authors()->sync($validated['author_ids']);

        return redirect()->route('admin.books.index')
            ->with('success', 'Книга успешно обновлена!');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        // Удаляем изображение при наличии
        if ($book->img && Storage::exists('public/'.$book->img)) {
            Storage::delete('public/'.$book->img);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Книга успешно удалена!');
    }
}
