@extends('admin.layouts.app')

@section('title')
    <title>Reading | Создать акцию</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('promotions.index') }}">Акции</a> /</span>Создать
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
        </div>
        <div class="card-body">
            <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Ru</label>
                    <input type="text" name="title[ru]" class="form-control @error('title.ru') is-invalid @enderror"
                           id="title" placeholder="Загаловок Ru" required>
                    @error('title.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="title">Загаловок Uz</label>
                    <input type="text" name="title[uz]" class="form-control @error('title.uz') is-invalid @enderror"
                           id="title" placeholder="Загаловок Uz" required>
                    @error('title.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label" for="description">Описание Ru</label>
                    <textarea name="description[ru]" class="form-control @error('description.ru') is-invalid @enderror"
                              id="description" placeholder="Описание Ru" required></textarea>
                    @error('description.ru')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Описание Uz</label>
                    <textarea name="description[uz]" class="form-control @error('description.uz') is-invalid @enderror"
                              id="description" placeholder="Описание Uz" required></textarea>
                    @error('description.uz')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="start_time">Дата начало</label>
                    <input type="datetime-local" name="start_time"
                           class="form-control @error('start_time') is-invalid @enderror"
                           id="start_time" placeholder="Дата начал" required>
                    @error('start_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="end_time">Дата конца</label>
                    <input type="datetime-local" name="end_time"
                           class="form-control @error('end_time') is-invalid @enderror"
                           id="end_time" placeholder="Дата конца" required>
                    @error('end_time')
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
