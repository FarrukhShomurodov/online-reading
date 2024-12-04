@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        @if(count($author->books) == 0)
            <div class="not-found">
                <p>@lang('site.not_found_book')</p>
                <button onclick="window.location.href='{{ url()->previous() }}'">@lang('site.back')</button>
            </div>
        @else
            <h3 style="padding-left: 0">@lang('siet.author_book') “{{ $author->name[$currentLang] }}”</h3>
            <div class="genre-grid all-genres">
                @foreach($author->books as $book)
                    <div class="book-container">
                        <div>
                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                 height="244px">
                            <div class="book-container-content">
                                <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                <div class=book-container-ratting>
                                    <img src="{{ asset('/img/icons/star.svg') }}" alt=star""
                                         style="height: 15px !important;">
                                    <b>{{ $book->ratting }} </b>
                                </div>
                                <p>{{ $book->title[$currentLang] }}</p>
                            </div>
                        </div>
                        <button
                            onclick="window.location.href='{{route('book.show', $book->id)}}'"> @lang('site.read_book')
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
