@extends('admin.layouts.app')

@section('title')
    <title>Online reading | Книги</title>
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
            <a href="{{ route('books.create') }}" class="btn btn-primary "
               style="margin-right: 22px;">Создать</a>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Активный</th>
                    <th>Дата публикации</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
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
                        <td>{{ $book->publication_date }}</td>
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
                url: `api/books/is-active/${bookId}`,
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

