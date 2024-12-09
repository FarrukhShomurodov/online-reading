<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow</title>

    {{-- Cache CSS --}}
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    {{-- flipbook --}}
    <script src="{{ asset('flipbook/source/js/magalone.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('flipbook/source/css/magalone.min.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('flipbook/source/css/fonts.min.css') }}" type="text/css" rel="stylesheet"/>


    <style>
        .alert {
            padding: 5px;
            margin-top: 10px;
            border-radius: 5px;
            background-color: transparent;
            color: rgba(239, 79, 79, 1);
            font-weight: 600;
            padding-left: 0 !important;
            margin-left: 0 !important;
            text-align: start;
        }

        .alert ul {
            padding-left: 20px;
            margin: 0;
        }

        .alert ul li {
            list-style: none;
        }
    </style>
</head>
<body>
<main class="container d-flex justify-content-center align-items-center flex-column">
    <div class="auth-container register">
        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>@lang('site.authorization')</h2>
                <span style="color: rgba(72, 72, 72, 1)">@lang('site.login_prompt')</span>
            </div>
            <div class="w-100">
                @if ($errors->any())
                    <div class="alert" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="{{route('user.register')}}" method="post" class="d-flex flex-column gap-4"
                      id="auth-form">
                    @csrf
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">@lang('site.phone_number') <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="sms-code">@lang('site.sms_code') <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <div class="d-flex gap-2">
                            <input name="sms_code[1]" type="number" maxlength="1" class="sms-code-input" id="sms-code-1"
                                   required>
                            <input name="sms_code[2]" type="number" maxlength="1" class="sms-code-input" id="sms-code-2"
                                   required>
                            <input name="sms_code[3]" type="number" maxlength="1" class="sms-code-input" id="sms-code-3"
                                   required>
                            <input name="sms_code[4]" type="number" maxlength="1" class="sms-code-input" id="sms-code-4"
                                   required>
                            <input name="sms_code[5]" type="number" maxlength="1" class="sms-code-input" id="sms-code-5"
                                   required>
                            <input name="sms_code[6]" type="number" maxlength="1" class="sms-code-input" id="sms-code-6"
                                   required>
                        </div>
                    </div>
                    <div class=" d-flex flex-column align-items-start w-100">
                        <label for="password">@lang('password') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="{{ __('site.create_password') }}"
                               id="password"
                               required>
                    </div>
                    <button type="submit">@lang('site.get_code')</button>
                </form>
            </div>
            <div class="auth-footer mt-3 d-flex flex-row justify-content-between align-items-center w-100">
                <a href="{{ url()->previous() == route('room') ? '/' : url()->previous() }}"><u>@lang('site.back')</u></a>
                <div>
                    <span>@lang('site.already_have_account')</span> <a id="login-auth-view"><u>@lang('site.entire')</u></a>
                </div>
            </div>

        </div>
    </div>


    <div class="auth-container login">
        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>@lang('site.entire_ac')</h2>
                <span style="color: rgba(72, 72, 72, 1)">@lang('site.login_prompt_main')</span>
            </div>
            <div class="w-100">
                @if ($errors->any())
                    <div class="alert" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="{{ route('user.login') }}" method="post" class="d-flex flex-column gap-4" id="auth-form">
                    @csrf
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">@lang('site.phone_number') <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="password">@lang('site.password') <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="{{ __('site.password_entire') }}"
                               id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">@lang('site.confirm')</button>
                </form>
            </div>
            <div class="auth-footer mt-3 d-flex flex-row justify-content-between align-items-center w-100">
                <a href="{{ url()->previous() == route('room') ? '/' : url()->previous() }}"><u>@lang('site.back')</u></a>
                <div>
                    <span>@lang('site.already_have_account')</span> <a
                        id="register-auth-view"><u>@lang('site.authorization')</u></a>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
    $(document).ready(function () {
        $('.close-popup').on('click', function () {
            window.location.href = '/'
        });

        $('#register-auth-view').on('click', function (event) {
            event.preventDefault();
            $('.register').css('display', 'block');
            $('.login').css('display', 'none');
        });

        $('#login-auth-view').on('click', function (event) {
            event.preventDefault();
            $('.login').css('display', 'block');
            $('.register').css('display', 'none');
        });

        const phoneInput = $('.phone');

        phoneInput.on('focus', function () {
            if (!$(this).val().startsWith('+ 998')) {
                $(this).val('+ 998 ');
            }
        });

        phoneInput.mask('+ 998 (00) 000 00 00', {
            placeholder: '+ 998 (__) ___ __ __',
            clearIfNotMatch: true
        });

        phoneInput.on('blur', function () {
            if ($(this).val() === '+ 998 ') {
                $(this).val('');
            }
        });

        const inputs = $('.sms-code-input');

        inputs.on('input', function () {
            const $this = $(this);
            const value = $this.val();

            if (!/^\d$/.test(value)) {
                $this.val('');
                return;
            }

            const nextInput = $this.next('.sms-code-input');
            if (nextInput.length) {
                nextInput.focus();
            }
        });

        inputs.on('keydown', function (e) {
            const $this = $(this);
            if (e.key === 'Backspace' && !$this.val()) {
                const prevInput = $this.prev('.sms-code-input');
                if (prevInput.length) {
                    prevInput.focus();
                }
            }
        });
    })
</script>
</body>
</html>


