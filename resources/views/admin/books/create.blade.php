@extends('admin.layouts.app')

@section('title')
    <title>Reading | Создать книгу</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('books.index') }}">Книги</a> /</span>Создать
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
            <h5 class="mb-0">Создать</h5>
            <label class="switch" style="margin-right: 40px">
                <input type="checkbox" class="switch-input" name="is_active" checked>
                <span class="switch-toggle-slider">
                    <span class="switch-on"></span>
                    <span class="switch-off"></span>
                </span>
            </label>
        </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="title" placeholder="Загаловок" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="number" class="is_active" name="is_active" hidden="">

                <div class="mb-3">
                    <label class="form-label" for="author">Автор</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror"
                           id="author" placeholder="Автор" required>
                    @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Описание</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              id="description" placeholder="Описание" required></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="publication_date">Дата публикации</label>
                    <input name="publication_date"
                           type="date"
                           class="form-control @error('publication_date') is-invalid @enderror"
                           id="publication_date" placeholder="Дата публикации" required>
                    @error('publication_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="category_id">Категории</label>
                    <select name="categories[]" class="select2 form-control @error('categories') is-invalid @enderror"
                            id="category_id" multiple required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}">
                                {{ $category->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('categories')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="genres">Жанры</label>
                    <select name="genres[]" class="select2 form-control @error('genres') is-invalid @enderror"
                            id="genres" multiple required>
                        @foreach($genres as $genre)
                            <option
                                value="{{ $genre->id }}">
                                {{ $genre->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tags">Теги</label>
                    <select name="tags[]" class="select2 form-control @error('tags') is-invalid @enderror"
                            id="tags" multiple required>
                        @foreach($tags as $tag)
                            <option
                                value="{{ $tag->id }}">
                                {{ $tag->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imageInput" class="form-label">Загрузить фото</label>
                    <input type="file" name="photos[]" id="imageInput" class="form-control" multiple>
                </div>
                <div id="imagePreview" class="mb-3 main__td"></div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.is_active').val(1);
            $('.switch-input').on('change', function () {
                let isActive = $(this).is(':checked') ? 1 : 0;
                $('.is_active').val(isActive);
            });
        });
    </script>
@endsection
