<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_book()
    {
        // Создаем пользователя с ролью администратора
        $admin = User::factory()->admin()->create();

        // Создаем книгу
        $book = Book::factory()->create();

        // Аутентифицируем администратора
        $this->actingAs($admin);

        // Проверяем, что книга существует в базе данных перед обновлением
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => $book->title,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'slug' => $book->slug,
            'img' => $book->img,
            'year' => $book->year, // Добавляем проверку года
        ]);

        // Фейковое изображение для теста
        $image = UploadedFile::fake()->image('updated-img.jpg');

        // Данные для обновления книги
        $updateData = [
            'title' => 'Updated Title',
            'author' => 'Updated Author',
            'publisher' => 'Updated Publisher',
            'slug' => 'updated-slug',
            'img' => $image, // Используем фейковое изображение
            'year' => 2024, // Добавляем год
        ];

        // Отправляем PUT запрос на обновление книги
        $response = $this->put("/admin/dashboard/books/{$book->id}", $updateData);

        // Проверяем, что запрос перенаправляет
        $response->assertRedirect(route('admin.books.index'));

        // Проверяем, что книга обновлена в базе данных
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Updated Title',
            'author' => 'Updated Author',
            'publisher' => 'Updated Publisher',
            'year' => 2024,  // Добавь это поле для проверки
        ]);

        // Проверяем, что старая информация больше не присутствует в базе
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
            'title' => $book->title,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'slug' => $book->slug,
            'img' => $book->img,
            'year' => $book->year, // Проверяем, что старый год отсутствует
        ]);
    }
}
