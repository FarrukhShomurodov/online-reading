@extends('admin.layouts.app')

@section('title')
    <title>Reading | Редактировать отзыв</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('reviews.index') }}">Отзывы</a> /</span>Редактировать
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
                <input type="checkbox" class="switch-input" name="is_view" @if($review->is_view) checked @endif>
                <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                </span>
            </label>
        </div>
        <div class="card-body">
            <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="name">Имя</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           id="name" placeholder="Имя" value="{{ $review->name }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="number" class="is_view" name="is_view" hidden="">

                <div class="mb-3">
                    <label class="form-label" for="last_name">Фамилия</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                           id="last_name" placeholder="Фамилия" value="{{ $review->last_name }}" required>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="text">Текст</label>
                    <textarea name="text" class="form-control @error('text') is-invalid @enderror"
                              id="text" placeholder="Описание" required>{{ $review->text }}</textarea>
                    @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ratting">Рейтинг</label>
                    <input type="number" name="ratting"
                           class="form-control @error('ratting') is-invalid @enderror" id="ratting"
                           placeholder="Рейтинг"
                           min="0" max="5" step="0.1" value="{{ $review->ratting }}" required>
                    @error('ratting')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="book_id">Книга</label>
                    <select name="book_id" class="select2 form-control @error('book_id') is-invalid @enderror"
                            id="book_id" required>
                        <option>Выберитие книгу</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}"
                                {{ in_array($book->id, old('reviews', $review->book->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $book->title['ru'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.is_view').val({{ $review->is_view ? 1 : 0 }});
            $('.switch-input').on('change', function () {
                let isActive = $(this).is(':checked') ? 1 : 0;
                $('.is_view').val(isActive);
            });
        });
    </script>
@endsection
