<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    // GET /api/v1/books
    public function index()
    {
        // Загружаем книги вместе с авторами и издателем
        $books = Book::with(['authors', 'publisher'])->paginate(10);

        return BookResource::collection($books);
    }

    // POST /api/v1/books
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
            'img' => 'nullable|image|max:4096',
        ]);

        // Генерация slug
        $validated['slug'] = Str::slug($validated['title']);

        // Обработка изображения, если есть
        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('books', 'public');
        } else {
            $validated['img'] = null;
        }

        // Создаем книгу
        $book = Book::create([
            'title' => $validated['title'],
            'publisher_id' => $validated['publisher_id'],
            'year' => $validated['year'],
            'img' => $validated['img'],
            'slug' => $validated['slug'],
        ]);

        // Связываем авторов (если связь belongsToMany)
        $book->authors()->sync($validated['author_ids']);

        return new BookResource($book);
    }

    // GET /api/v1/books/{book}
    public function show(Book $book)
    {
        $book->load(['authors', 'publisher']);

        return new BookResource($book);
    }

    // PUT/PATCH /api/v1/books/{book}
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
            'img' => 'nullable|image|max:4096',
        ]);

        // Обработка нового изображения
        if ($request->hasFile('img')) {
            if ($book->img && Storage::exists('public/'.$book->img)) {
                Storage::delete('public/'.$book->img);
            }
            $validated['img'] = $request->file('img')->store('books', 'public');
        }

        $book->update([
            'title' => $validated['title'],
            'publisher_id' => $validated['publisher_id'],
            'year' => $validated['year'],
            'img' => $validated['img'] ?? $book->img,
            'slug' => Str::slug($validated['title']),
        ]);

        $book->authors()->sync($validated['author_ids']);

        return new BookResource($book);
    }

    // DELETE /api/v1/books/{book}
    public function destroy(Book $book)
    {
        if ($book->img && Storage::exists('public/'.$book->img)) {
            Storage::delete('public/'.$book->img);
        }
        $book->delete();

        return response()->json(['message' => 'Книга успешно удалена']);
    }
}
