@extends('admin.layouts.app')

@section('title')
    <title>Online reading | Отзывы</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Отзывы</span>
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
            <h5 class="card-header">Отзывы</h5>
            <a href="{{ route('reviews.create') }}" class="btn btn-primary "
               style="margin-right: 22px;">Создать</a>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                <tr>
                    <th>Книга</th>
                    <th>Пользователь</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Текст</th>
                    <th>Рейтинг</th>
                    <th>Просмотр</th>
                    <th>Дата создание</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->book->title }}</td>
                        <td>{{ $review->user->name ?? '' }}</td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->last_name }}</td>
                        <td>{{ $review->text }}</td>
                        <td>{{ $review->ratting }}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="switch-input" data-review-id="{{ $review->id }}"
                                       @if($review->is_view) checked @endif>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                            </label>
                        </td>
                        <td>{{ $review->created_at }}</td>
                        <td>
                            <div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-icon"
                                        onclick="location.href='{{ route('reviews.edit', $review->id) }}'"><i
                                        class="bx bx-edit"></i></button>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
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
            let reviewId = $(this).data('review-id');
            let isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: `api/reviews/is_view/${reviewId}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_view: isActive,
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
                            Возникла ошибка повторте попытку позже.
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

