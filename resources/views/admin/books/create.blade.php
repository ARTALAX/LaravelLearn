@extends('admin.main')

@section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Добавить новую книгу</h4>
                </div>
                <div class="card-body py-5">
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data"
                          class="px-4">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="title" class="form-label">Название книги</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Введите название книги" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="mt-2 text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Выбор нескольких авторов --}}
                        <div class="form-group mb-4">
                            <label for="authors" class="form-label">Авторы</label>
                            <select name="author_ids[]" id="authors" class="form-control" multiple required>
                                <option value="" disabled selected>Выберите издателя</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('publisher_id') == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('author_ids')
                            <div class="mt-2 text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Выбор одного издателя --}}
                        <div class="form-group mb-4">
                            <label for="publisher" class="form-label">Издатель</label>
                            <select name="publisher_id" id="publisher" class="form-control" required>
                                <option value="" disabled selected>Выберите издателя</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                            <div class="mt-2 text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="year" class="form-label">Год издания</label>
                            <input type="number" name="year" id="year"
                                   class="form-control @error('year') is-invalid @enderror"
                                   placeholder="Введите год издания"
                                   value="{{ old('year', date('Y')) }}" min="1900" max="{{ date('Y') }}" required>
                            @error('year')
                            <div class="mt-2 text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="img" class="form-label">Обложка книги</label>
                            <input type="file" name="img" id="img"
                                   class="form-control @error('img') is-invalid @enderror">
                            @error('img')
                            <div class="mt-2 text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary px-4">Создать книгу</button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-secondary px-4">Отмена</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
