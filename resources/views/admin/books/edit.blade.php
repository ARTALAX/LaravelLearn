@extends('admin.main')
@include('admin.books.show')
<!-- Правый столбец с формой для редактирования -->
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h3>Редактировать книгу</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.books.update', $book->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title', $book->title) }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" name="author" id="author" class="form-control"
                           value="{{ old('author', $book->author) }}">
                    @error('author')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="publisher">Издатель</label>
                    <input type="text" name="publisher" id="publisher" class="form-control"
                           value="{{ old('publisher', $book->publisher) }}">
                    @error('publisher')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Год издания</label>
                    <input type="number" name="year" id="year" class="form-control"
                           value="{{ old('year', $book->year) }}">
                    @error('year')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="img">Изображение</label>
                    <input type="file" name="img" id="img" class="form-control">
                    @error('img')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
