<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->latest('updated_at')->paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        //        dd($request->all());
        // Валидация входных данных
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'img' => 'nullable|image|max:4096',

        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('books', 'public');

            $validatedData['img'] = $imagePath;
        } else {
            $validatedData['img'] = null;

        }

        Book::query()->create($validatedData);

        // Редирект с уведомлением об успешном добавлении
        return redirect()->route('admin.books.index')->with('success', 'Книга успешно добавлена!');
    }

    public function show(string $id)
    {
        $book = Book::query()->findOrFail($id)->sortByDesc('created_at');

        return view('admin.books.show', compact('book'));
    }

    public function edit($id)
    {

        $book = Book::query()->findOrFail($id);

        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Валидация входных данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'img' => 'nullable|image|max:4096',
            // проверка на изображение
        ]);

        // Найти книгу по ID
        $book = Book::query()->findOrFail($id);

        // Если было загружено новое изображение
        if ($request->hasFile('img')) {
            // Удаление старого изображения, если оно есть
            if ($book->img && \Storage::exists('public/'.$book->img)) {
                \Storage::delete('public/'.$book->img);
            }

            // Сохранение нового изображения
            $imagePath = $request->file('img')->store('books', 'public');
            $book->img = $imagePath; // сохраняем путь к новому изображению в базе данных
        }

        // Обновляем остальные поля
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->publisher = $validated['publisher'];
        $book->year = $validated['year'];

        // Сохраняем обновленную книгу
        $book->save();

        // Перенаправляем на страницу с книгами с сообщением об успешном обновлении
        return redirect()->route('admin.books.index');
    }

    public function destroy(string $id)
    {
        $book = Book::query()->findOrFail($id);
        $book->delete();

        return redirect()->back();
    }
}
