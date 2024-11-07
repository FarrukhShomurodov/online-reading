@extends('admin.layouts.app')

@section('title')
    <title>Reading | Редактировать коллекцию</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('collections.index') }}">Колекции</a> /</span>Редактировать
    </h6>

    <div class="alert-container position-fixed top-0 end-0 p-3" style="z-index: 10050;">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-solid-danger alert-dismissible d-flex align-items-center" role="alert">
                    <i class="bx bx-error-circle fs-4 me-2"></i>
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Редактировать</h5>
            <label class="switch" style="margin-right: 40px">
                <input type="checkbox" class="switch-input" name="is_active" checked>
                <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                </span>
            </label>
        </div>
        <div class="card-body">
            <form action="{{ route('collections.update', $collection->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Название</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                           placeholder="Загаловок" value="{{$collection->name}}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Описание</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              id="description" placeholder="Описание"
                              required>{{ $collection->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @php

                    $collectionBookIds = $collection->books->pluck('id')->toArray();

                    $books = $books->sortBy(function($book) use ($collectionBookIds) {
                        return array_search($book->id, $collectionBookIds);
                    });
                @endphp

                <div class="mb-3 books_input">
                    <label class="form-label" for="books">Добавить книги</label>
                    <select class="select2 form-control @error('books') is-invalid @enderror" id="books"
                            multiple required>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}"
                                    data-image-url="{{ $book->first_image_url }}"
                                {{ in_array($book->id, $collectionBookIds) ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>

                    <input type="hidden" name="books[]">

                    @error('books')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Порядок книг</label>
                    <div id="sortable-books" class="row">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imageInput" class="form-label">Загрузить фото</label>
                    <input type="file" name="photos[]" id="imageInput" class="form-control" multiple>
                </div>

                <div id="imagePreview" class="mb-3 main__td">
                    @if($collection->images)
                        @foreach(json_decode($collection->images) as $photo)
                            <div class="image-container td__img" data-photo-path="{{ $photo->url }}">
                                <img src="{{ asset('storage/' . $photo->url) }}" alt="Court Image"
                                     class="uploaded-image">
                                <button type="button" class="btn btn-danger btn-sm delete-image"
                                        data-photo-path="{{ $photo->url }}"> Удалить
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="submit" class="btn btn-warning ">Редактировать</button>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
    <script>
        $(document).ready(function () {
                $('#books').select2().on('change', function () {
                    updateBookList();
                });

                function updateBookList() {
                    const selectedBooks = $('#books').val();
                    $('#sortable-books').empty();
                    $('input[name="books[]"]').remove();

                    selectedBooks.forEach((id, index) => {
                        const option = $('#books option[value="' + id + '"]');
                        const title = option.text();
                        const imageUrl = option.data('image-url');
                        const image = imageUrl ? ` <img src="${imageUrl}" alt="${title}" class="mb-2" width="70" height="70" style="object-fit: cover;">` : ''
                        $('#sortable-books').append(`
                    <div class="col-md-3 sortable-item" data-id="${id}">
                        <div class="card shadow-sm mb-2">
                            <div class="card-body text-center">
                                <div class="drag-handle"><i class="bx bx-move"></i></div>
                                ${image}
                                <div class="order-number bg-primary mb-1">${index + 1}</div>
                                <span>${title}</span>
                            </div>
                        </div>
                    </div>
                `);
                        $('.books_input').append(`<input type="hidden" name="books[]" value="${id}">`);

                    });
                }

                updateBookList()

                new Sortable(document.getElementById('sortable-books'), {
                    animation: 200,
                    onEnd: function () {
                        updateBookOrder();
                        updateOrderNumbers();
                    }
                });

                function updateBookOrder() {
                    const order = Array.from(document.querySelectorAll('#sortable-books .sortable-item'))
                        .map(el => parseInt(el.dataset.id, 10));

                    $('input[name="books[]"]').remove();

                    order.forEach(id => {
                        $('.books_input').append(`<input type="hidden" name="books[]" value="${id}">`);
                    });
                }

                function updateOrderNumbers() {
                    $('#sortable-books .order-number').each((index, el) => {
                        $(el).text(index + 1);
                    });
                }
            }
        )
        ;
    </script>
@endsection
