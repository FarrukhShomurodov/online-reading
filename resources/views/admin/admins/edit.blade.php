@extends('admin.layouts.app')

@section('title')
    <title>Journal - Редактировать пользователя</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light"><a class="text-muted"
                                             href="{{ route('admins.index') }}">Пользователи</a> /</span>Редактировать
    </h6>
    @if ($errors->any())
        <div class="alert alert-solid-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Редактировать</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="email">Email *</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ $admin->email }}"
                           id="email" placeholder="Email" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                           id="password"
                           placeholder="Пароль">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning ">Редактировать</button>
            </form>
        </div>
    </div>
@endsection
