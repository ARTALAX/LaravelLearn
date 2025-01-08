@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ $book->img }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $book->author }}</li>
                            <li class="list-group-item">{{ $book->publisher }}</li>
                            <li class="list-group-item">{{ $book->year }}</li>
                        </ul>
                        <div class="card-body">
                            {{--                            <a href="{{ route('books.show', $book->id) }}" class="card-link">Подробнее</a>--}}
                            <a href="#" class="card-link">Другая ссылка</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
