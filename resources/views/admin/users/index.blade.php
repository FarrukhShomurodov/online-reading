@extends('admin.layouts.app')

@section('title')
    <title>Reading | Пользователи сайта</title>
@endsection

@section('content')
    <h6 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Пользователи сайта</span>
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

    <div class="card shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">Пользователи сайта</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Номер телефона</th>
                    <th>Активный</th>
                    <th>Дата регистрации</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="switch-input"
                                       data-user-id="{{$user->id}}" @checked($user->is_active)>
                                <span class="switch-toggle-slider"><span class="switch-on"></span>
                                <span class="switch-off"></span></span>
                            </label>
                        </td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 p-1">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('change', '.switch-input', function () {
            let switchInput = $(this);
            let userId = $(this).data('user-id');
            let isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: `api/users/is-active/${userId}`,
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    is_active: isActive,
                },
                success: function () {
                    $('.alert-container').append(` <div class="alert alert-solid-success alert-dismissible d-flex align-items-center" role="alert">
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
