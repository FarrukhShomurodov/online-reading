@extends('admin.layouts.app')

@section('title')
    <title>Reading | Создать акцию</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('promotions.index') }}">Акции</a> /</span>Редактировать
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
            <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="title">Заголовок</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="title" placeholder="Название" value="{{$promotion->title}}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Описание</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                              id="description" placeholder="Описание" required>{{$promotion->description}}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="start_time">Дата начало</label>
                    <input type="datetime-local" name="start_time"
                           class="form-control @error('start_time') is-invalid @enderror"
                           id="start_time" placeholder="Дата начал" value="{{$promotion->start_time}}" required>
                    @error('start_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="end_time">Дата конца</label>
                    <input type="datetime-local" name="end_time"
                           class="form-control @error('end_time') is-invalid @enderror"
                           id="end_time" placeholder="Дата конца" value="{{$promotion->end_time}}" required>
                    @error('end_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="imageInput" class="form-label">Загрузить фото</label>
                    <input type="file" name="photos[]" id="imageInput" class="form-control" multiple>
                </div>
                <div id="imagePreview" class="mb-3 main__td">
                    @if($promotion->images)
                        @foreach(json_decode($promotion->images) as $photo)
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
