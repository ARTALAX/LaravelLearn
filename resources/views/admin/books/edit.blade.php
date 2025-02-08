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

                <select name="author_ids[]" multiple class="form-control">
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ in_array($author->id, old('author_ids', $author->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>

                <select name="publisher_ids[]" multiple class="form-control mt-4">
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                            {{ in_array($publisher->id, old('publisher_ids', $publisher->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>

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
