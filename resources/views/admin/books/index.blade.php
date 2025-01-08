@extends('admin.main')

@section('content')
    <div class="container">
        <div class="m-3 text-center"><h1>Книги</h1></div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($books as $book)
            <div>
                <ol class="list-group mb-2">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-flex align-items-center">
                                <span class="me-2">{{ $loop->iteration }}.</span> <!-- Нумерация -->
                                {{ $book->title }} <!-- Название книги -->
                            </span>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('admin.books.edit', $book->id) }}"
                               class="btn btn-primary mx-1">Изменить</a>

                            <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </li>
                </ol>
            </div>
        @endforeach

        <!-- Пагинация -->
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>

        <!-- Кнопка "Создать книгу" -->
        <div class="d-flex justify-content-end ">
            <a href="{{ route('admin.books.create') }}" class="btn btn-secondary btn-lg">Создать книгу</a>
        </div>

@endsection

