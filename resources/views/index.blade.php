@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-3 mb-4">
                    <div class="card mt-4"
                         style="width: 100%; border: 1px solid #0d1116; border-radius: 5px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $book->img) }}"
                             class="img-fluid" alt="{{ $book->title }}"
                             style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body ">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="" style="color: #6c757d; margin: 0;"> {{ $book->author }}</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link ">Купить</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
