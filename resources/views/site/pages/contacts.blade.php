@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div class="genres-book-info" style="padding-left: 0">
    <span class="d-flex align-items-center">
        <img src="{{asset('img/icons/chevron-left.svg')}}" alt="left" width="16px">
        <a href="{{ url('/') }}">@lang('site.home') </a> / @lang('site.contacts')
    </span>
        </div>

        <h3 style="padding-left: 0">@lang('site.contacts')</h3>

        <div class="d-flex flex-row flex-wrap justify-content-between align-items-center" style="padding: 0px">
            <div class="contact-container">
                <img src="{{asset('img/icons/phone.svg')}}" alt="phone">
                <div class="d-flex flex-row flex-wrap">
                    <span class="me-1">@lang('site.phone_call'): </span>
                    <p>+ 998 (99) 123 45 67</p>
                </div>
            </div>
            <div class="contact-container">
                <img src="{{asset('img/icons/mail.svg')}}" alt="mail">
                <div class="d-flex flex-row flex-wrap">
                    <span class="me-1">@lang('site.email'): </span>
                    <p>example@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
@endsection
