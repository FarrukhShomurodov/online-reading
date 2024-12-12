@extends('admin.layouts.app')

@section('title')
    <title>Reading | Книги</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Книги</span>
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

        @if(session()->has('success'))
            <div class="alert alert-solid-success alert-dismissible d-flex align-items-center" role="alert">
                <i class="bx bx-check-circle fs-4 me-2"></i>
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div id="errors_alert"></div>

    <div class="card shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">Книги</h5>
            <div>
                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filtersCollapse">
                    <i class="bx bx-filter-alt"></i> Фильтры
                </button>
                <a href="{{ route('books.create') }}" class="btn btn-primary"
                   style="margin-right: 22px;">Создать</a>
            </div>
        </div>

        <div id="filtersCollapse"
             class="collapse @if(request('category_id') || request('genre_id') || request('tag_id')) show @endif">
            <div class="card-body">
                <form method="GET" action="{{ route('books.index') }}">
                    <div class="row g-3">
                        @php
                            $filters = [
                                ['id' => 'category', 'label' => 'Категории', 'items' => $categories],
                                ['id' => 'genre', 'label' => 'Жанры', 'items' => $genres],
                                ['id' => 'tag', 'label' => 'Теги', 'items' => $tags],
                                ['id' => 'collection', 'label' => 'Колекции', 'items' => $collections],
                                ['id' => 'author', 'label' => 'Авторы', 'items' => $authors],
                            ];
                        @endphp

                        @foreach($filters as $filter)
                            <div class="col-md-3 form-group">
                                <label for="{{ $filter['id'] }}">{{ $filter['label'] }}</label>
                                <select id="{{ $filter['id'] }}" name="{{ $filter['id'] }}_id"
                                        class="form-control select2">
                                    <option value="">Все</option>
                                    @foreach($filter['items'] as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request("{$filter['id']}_id") == $item->id ? 'selected' : '' }}>
                                            {{ $item->name['ru'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Применить фильтр</button>
                </form>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Активный</th>
                    <th>Дата публикации</th>
                    <th>Активация книги</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title['ru'] }}</td>
                        <td>{{ $book->author->name['ru'] }}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="switch-input" data-book-id="{{ $book->id }}"
                                       @if($book->is_active) checked @endif>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                        </td>
                        <td>{{ $book->publication_date }}
                        <td>
                            @php
                                $sourcePathRu= public_path("book_files/$book->id/ru/upload.php");
                                $sourcePathUz = public_path("book_files/$book->id/uz/upload.php");
                            @endphp
                            <div class="m-auto">
                                @if(file_exists($sourcePathRu))
                                    <button class="btn btn-sm btn-primary">
                                        <a class="text-white"
                                           href="{{ route('flip.book', [$book->id, 'ru'])}}">Ru</a>
                                    </button>
                                @endif
                                @if(file_exists($sourcePathUz))
                                    <button class="btn btn-sm btn-primary">
                                        <a class="text-white"
                                           href="{{ route('flip.book', [$book->id, 'uz'])}}">Uz</a>
                                    </button>
                                @endif

                                @if(!file_exists($sourcePathRu) && !file_exists($sourcePathUz))
                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i> Активировано
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-icon"
                                        onclick="location.href='{{ route('books.edit', $book->id) }}'"><i
                                        class="bx bx-edit"></i></button>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 p-1">
                {{ $books->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).on('change', '.switch-input', function () {
            let switchInput = $(this);
            let bookId = $(this).data('book-id');
            let isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: `/api/books/is-active/${bookId}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_active: isActive,
                },
                success: function () {
                    $('.alert-container').append(`<div class="alert alert-solid-success alert-dismissible d-flex align-items-center" role="alert">
                            <i class="bx bx-check-circle fs-4 me-2"></i>
                          Статус успешно изменен.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`)
                    setTimeout(function () {
                        $('.alert').fadeOut('slow', function () {
                            $(this).remove();
                        });
                    }, 3000);
                },
                error: function (error) {
                    console.error('Error updating user status:', error);
                    $('.alert-container').append(`<div class="alert alert-solid-danger alert-dismissible d-flex align-items-center" role="alert">
                        <i class="bx bx-error-circle fs-4 me-2"></i>
                        <ul class="mb-0">
                            <li>Возникла ошибка повторте попытку позже.</li>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`)
                    setTimeout(function () {
                        $('.alert').fadeOut('slow', function () {
                            $(this).remove();
                        });
                    }, 3000);
                    switchInput.prop('checked', !isActive);
                }
            });
        });
    </script>
@endsection

