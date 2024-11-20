@extends('admin.layouts.app')

@section('title')
    <title>Reading | Редактировать новость</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('news.index') }}">Новости</a> /</span>Редактировать
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
        </div>
        <div class="card-body">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Ru</label>
                    <input type="text" name="title[ru]" class="form-control @error('title.ru') is-invalid @enderror"
                           id="title" placeholder="Загаловок Ru" value="{{$news->title['ru']}}" required>
                    @error('title.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Uz</label>
                    <input type="text" name="title[uz]" class="form-control @error('title.uz') is-invalid @enderror"
                           id="title" placeholder="Загаловок Uz" value="{{$news->title['uz']}}" required>
                    @error('title.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label" for="text">Текст Ru</label>
                    <textarea name="text[ru]" class="form-control @error('text.ru') is-invalid @enderror"
                              id="text" placeholder="Текст Ru" required>{{$news->text['ru']}}</textarea>
                    @error('text.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="text">Текст Uz</label>
                    <textarea name="text[uz]" class="form-control @error('text.uz') is-invalid @enderror"
                              id="text" placeholder="Текст Uz" required>{{$news->text['uz']}}</textarea>
                    @error('text.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="news_category_id">Категории</label>
                    <select name="news_category_id"
                            class="select2 form-control @error('news_category_id') is-invalid @enderror"
                            id="news_category_id" required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                @selected($category->id == $news->news_category_id)
                            >
                                {{ $category->name['ru']}}
                            </option>
                        @endforeach
                    </select>
                    @error('news_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="imageInput" class="form-label">Загрузить фото</label>
                    <input type="file" name="photos[]" id="imageInput" class="form-control" multiple>
                </div>

                <div id="imagePreview" class="mb-3 main__td">
                    @if($news->images)
                        @foreach(json_decode($news->images) as $photo)
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
