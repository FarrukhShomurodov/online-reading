@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div class="mb-3">
            <div class="not-found d-flex align-items-start" style="padding: 0">
                <button onclick="window.location.href='{{ route('book.show', $book->id) }}'">@lang('site.back')</button>
            </div>
        </div>

        <div id="reader-container" class="w-100"
             data-path="{{ asset('book_files/' . $book->id . '/'. $currentLang) }}"
             data-show-fullscreen="true"
             data-language="en"
             data-enable-swiping="true"
             data-enable-pinching="true"
             data-max-zoom="200"></div>
    </div>
@endsection
