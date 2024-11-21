@extends('admin.layouts.app')

@section('title')
    <title>Reading | Редактировать книгу</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('books.index') }}">Книги</a> /</span>Редактировать
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
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Ru</label>
                    <input type="text" name="title[ru]" class="form-control @error('title.ru') is-invalid @enderror"
                           id="title" placeholder="Загаловок Ru" value="{{ $book->title['ru'] }}" required>
                    @error('title.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Uz</label>
                    <input type="text" name="title[uz]" class="form-control @error('title.uz') is-invalid @enderror"
                           id="title" placeholder="Загаловок Uz" value="{{ $book->title['uz'] }}" required>
                    @error('title.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="number" class="is_active" name="is_active" value="{{ $book->is_active }}" hidden="">

                <div class="mb-3">
                    <label class="form-label" for="author_id">Авторы</label>
                    <select name="author_id" class="select2 form-control @error('author_id') is-invalid @enderror"
                            id="author_id" required>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ $author->id, $book->author_id ? 'selected' : '' }}>
                                {{ $author->name['ru'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label" for="description">Описание Ru</label>
                    <textarea name="description[ru]" class="form-control @error('description.ru') is-invalid @enderror"
                              id="description" placeholder="Описание Ru"
                              required>{{ $book->description['ru'] }}</textarea>
                    @error('description.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Описание Uz</label>
                    <textarea name="description[uz]" class="form-control @error('description.uz') is-invalid @enderror"
                              id="description" placeholder="Описание uz"
                              required>{{ $book->description['uz'] }}</textarea>
                    @error('description.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="publication_date">Дата публикации</label>
                    <input name="publication_date"
                           type="date"
                           value="{{ $book->publication_date }}"
                           class="form-control @error('publication_date') is-invalid @enderror"
                           id="publication_date" placeholder="Дата публикации" required>
                    @error('publication_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ratting">Рейтинг</label>
                    <input type="number" name="ratting"
                           class="form-control @error('ratting') is-invalid @enderror" id="ratting"
                           placeholder="Рейтинг"
                           value="{{ $book->ratting }}"
                           min="0" max="5" step="0.1" required>
                    @error('ratting')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="readen_count">Кол - во прочитаных</label>
                    <input type="number" name="readen_count"
                           class="form-control @error('readen_count') is-invalid @enderror" id="readen_count"
                           value="{{ $book->readen_count }}"
                           placeholder="Кол - во прочитаных" required>
                    @error('readen_count')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="pages">Страницы</label>
                    <input type="number" name="pages"
                           value="{{ $book->pages }}"
                           class="form-control @error('pages') is-invalid @enderror" id="pages"
                           placeholder="Кол - во прочитаных" required>
                    @error('pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="category_id">Категории</label>
                    <select name="categories[]" class="select2 form-control @error('categories') is-invalid @enderror"
                            id="category_id" required multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $category->name['ru'] }}
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
                            id="genres" required multiple>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"
                                {{ in_array($genre->id, old('genres', $book->genres->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $genre->name['ru'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('genres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tags">Теги</label>
                    <select name="tags[]" class="select2 form-control @error('tags') is-invalid @enderror"
                            id="tags" required multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array($tag->id, old('tags', $book->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $tag->name['ru'] }}
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

                <div id="imagePreview" class="mb-3 main__td">
                    @if($book->images)
                        @foreach(json_decode($book->images) as $photo)
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

                {{-- Books --}}
                <div class="mb-3">
                    <label for="fileRu" class="form-label">Загрузить книгу (RU)</label>
                    <input type="file" name="files[ru]" id="fileRu" class="form-control" accept=".pdf">
                    @if(isset($book->files['ru']))
                        <div class="mt-2">
                            <a href="{{ Storage::url($book->files['ru']) }}" target="_blank">Скачать текущий файл
                                (RU)</a>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="fileUz" class="form-label">Загрузить книгу (UZ)</label>
                    <input type="file" name="files[uz]" id="fileUz" class="form-control" accept=".pdf">
                    @if(isset($book->files['uz']))
                        <div class="mt-2">
                            <a href="{{ Storage::url($book->files['uz']) }}" target="_blank">Скачать текущий файл
                                (UZ)</a>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-warning ">Редактировать</button>
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
