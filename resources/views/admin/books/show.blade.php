@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Левый столбец с данными книги -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Информация о книге
                            <strong>ID:</strong> {{ $book->id }}</h3>
                    </div>
                    <div class="card-body">

                        <p><strong>Название:</strong> {{ $book->title }}</p>

                        <p><strong>Автор:</strong> {{ $book->authors->pluck('name')->implode(',') }}</p>
                        <p><strong>Издатель:</strong> {{ $book->publishers->pluck('name')->implode(',') }}</p>
                        <p><strong>Год издания:</strong> {{ $book->year}}</p>
                        <p><strong>Обложка:</strong> <img src="{{ asset('storage/' . $book->img) }}"
                                                          class="img-fluid" alt="{{ $book->title }}">
                        </p>
                    </div>
                </div>
            </div>

