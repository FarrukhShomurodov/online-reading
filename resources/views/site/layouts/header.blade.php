@php
    $currentLang = app()->getLocale();
@endphp

<header class="desktop justify-content-between align-items-center">
    <img class="pointer-event" src="{{asset('img/logo.png')}}" alt="logo" width="70px" height="27px"
         onclick="window.location.href='{{url('/')}}'">
    <div class="container d-flex justify-content-between align-items-center">
        <ul class="menu">
            <li class="menu-item @if(Request::is('/')) active @endif" style="margin-left: 0 !important;"><a
                    href="{{ url('/') }}">@lang('site.home')</a></li>
            <li class="menu-item @if(Request::is('categories') || Request::is('category-books*')) active @endif"><a
                    href="{{ route('categories') }}">@lang('site.categories')</a></li>
            <li class="menu-item @if(Request::is('genres') || Request::is('genre-books*')) active @endif"><a
                    href="{{ route('genres') }}">@lang('site.genres')</a>
            </li>
            <li class="menu-item @if(Request::is('collections') || Request::is('collection-books*')) active @endif"><a
                    href="{{ route('collections') }}">@lang('site.collections')</a></li>
            <li class="menu-item @if(Request::is('contacts')) active @endif"><a
                    href="{{ route('contacts') }}">@lang('site.contacts')</a></li>
            <li class="menu-item @if(Request::is('offer') || Request::is('news*') || Request::is('promotion*')) active @endif">
                <a href="{{ route('offer') }}">@lang('site.offer')</a></li>
            <li class="menu-item @if(Request::is('about-us')) active @endif"><a
                    href="{{ route('about-us') }}">@lang('site.about_us')</a>
            </li>
        </ul>

        <div class="search-container">
            <form action="{{ route('search') }}" method="GET">
                <img class="search-icon" src="{{ asset('img/icons/search.svg') }}" alt="search">
                <input class="search" name="query" type="text" placeholder="{{ __('site.search_placeholder') }}"
                       value="{{ request('query') }}">
                <img class="cross-icon" src="{{ asset('img/icons/cross.svg') }}" alt="search">
            </form>
        </div>

        <div class="custom-select-container">
            <div class="custom-select">
                <div class="custom-select-selected">
                    @if($currentLang= 'uz')
                        <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                    @else
                        <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
                    @endif
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option" onclick="window.location.href='{{route('change-locale', 'ru')}}'">
                        <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                    </div>
                    <div class="custom-select-option" onclick="window.location.href='{{route('change-locale', 'uz')}}'">
                        <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div class="user-ava d-flex justify-content-center align-items-center"><span>F</span></div>--}}

    <div class="custom-select-container">
        <div class="custom-select">
            <div class="custom-select-selected user-ava d-flex justify-content-center align-items-center">
                F
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option">
                    <a href="{{route('room')}}">@lang('site.room')</a>
                </div>
                <div class="custom-select-option">
                    @if(auth()->guard('user')->user())
                        <a href="{{route('user.logout')}}">@lang('site.logout')</a>
                    @else
                        <a class="login-link">@lang('site.login')</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<header class="mobile-device align-items-center">
    <div class="container d-flex justify-content-between flex-row align-items-center w-100">
        <img src="{{asset('img/logo.png')}}" alt="logo" width="70px" height="27px"
             onclick="window.location.href='{{url('/')}}'">

        <div class="menu-mobile-nav">
            <img class="search-icon-mobile" src="{{asset('img/icons/search.svg')}}" alt="">
            <div class="user-ava d-flex justify-content-center align-items-center"
                 onclick="window.location.href='/room'"><span>F</span></div>
            <img class="menu-icon" src="{{asset('img/icons/menu.svg')}}" alt="">
        </div>
    </div>
</header>

<div class="search-container search-mobile">
    <form action="{{ route('search') }}" method="GET">
        <img class="search-icon" src="{{ asset('img/icons/search.svg') }}" alt="search">
        <input class="search" name="query" type="text" placeholder="{{ __('site.search_placeholder') }}"
               value="{{ request('query') }}">
        <img class="cross-icon" src="{{ asset('img/icons/cross.svg') }}" alt="search">
    </form>
</div>


<!-- popup menu -->
<div class="menu-mobile-active">
    <div class="d-flex justify-content-between align-items-cente w-100">
        <div class="custom-select">
            <div class="custom-select-selected">
                @if($currentLang= 'uz')
                    <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                @else
                    <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
                @endif
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option" onclick="window.location.href='{{route('change-locale', 'ru')}}'">
                    <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                </div>
                <div class="custom-select-option" onclick="window.location.href='{{route('change-locale', 'uz')}}'">
                    <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                </div>
            </div>
        </div>
        <img src="{{asset('img/menu-logo.png')}}" alt="logo" width="99px" height="38px">
        <img class="close-menu" src="{{ asset('img/icons/cross.svg') }}" alt="" width="36px" height="36px">
    </div>
    <ul class="menu d-flex justify-content-center flex-column">
        <li class="menu-item active"><a href="{{ url('/') }}">@lang('site.home')</a></li>
        <li class="menu-item"><a href="{{ route('categories') }}">@lang('site.categories')</a></li>
        <li class="menu-item"><a href="{{ route('genres') }}">@lang('site.genres')</a></li>
        <li class="menu-item"><a href="{{ route('collections') }}">@lang('site.collections')</a></li>
        <li class="menu-item"><a href="{{ route('contacts') }}"> @lang('site.contacts') </a></li>
        <li class="menu-item"><a href="{{ route('offer') }}">@lang('site.offer')</a></li>
        <li class="menu-item"><a href="{{ route('about-us') }}">@lang('site.about_us')</a></li>
    </ul>

    <button onclick="window.location.href='{{route('room')}}'">@lang('site.my_books')</button>
</div>

{{-- Auth --}}
<div class="auth-section" id="auth-popup">
    <div class="auth-container register">
        <button class="close-btn close-popup">×</button>

        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>@lang('site.authorization')</h2>
                <span style="color: rgba(72, 72, 72, 1)">@lang('site.login_prompt')</span>
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="{{route('user.register')}}" method="post" class="d-flex flex-column gap-4" id="auth-form">
                    @csrf
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">@lang('site.phone_number') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="sms-code">@lang('site.sms_code') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
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
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="password">@lang('site.password') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="{{ __('site.create_password') }}"
                               id="password"
                               required>
                    </div>
                    <button type="submit">@lang('site.get_code')</button>
                </form>
            </div>
            <div class="auth-footer">
                <span>@lang('site.already_have_account')</span> <a id="login"><u>@lang('site.entire')</u></a>
            </div>
        </div>
    </div>


    <div class="auth-container login">
        <button class="close-btn close-popup">×</button>

        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>@lang('site.entire_ac')</h2>
                <span style="color: rgba(72, 72, 72, 1)">@lang('site.login_prompt_main')</span>
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="{{route('user.login')}}" method="post" class="d-flex flex-column gap-4" id="auth-form">
                    @csrf
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">@lang('site.phone_number') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="password">@lang('site.password') <span
                                style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="{{ __('site.password_entire') }}"
                               id="password"
                               required>
                    </div>
                    <button type="submit">@lang('site.confirm')</button>
                </form>
            </div>
            <div class="auth-footer">
                <span>@lang('site.already_have_account')</span> <a id="register"><u>@lang('site.authorization')</u></a>
            </div>
        </div>
    </div>
</div>
