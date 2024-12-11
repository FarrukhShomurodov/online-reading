@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div class=" genres-book-info room-text d-block">
            <p style="margin-bottom: 0 !important;">@lang('site.room')</p>
            <span class="author">@lang('site.welcome')</span>
        </div>

        <div class="d-flex flex-row align-items-start cabinet-menu">
            <button class="cabinet-menu-item @if(Request::is('room')) cabinet-menu-active @endif"
                    onclick="window.location.href='{{route('room')}}'">@lang('site.my_books')
            </button>
            <button class="cabinet-menu-item @if(Request::is('get-reed-books')) cabinet-menu-active @endif"
                    onclick="window.location.href='{{route('show.read.books')}}'">@lang('site.read_marked_book')
            </button>
        </div>

        <div class="room-book room-section">
            @foreach($books as $userBook)
                @if($userBook->book->is_active)
                    <div class="d-flex flex-row align-items-start gap-5">
                        <div class="w-100">
                            <div class="room-book-container"
                                 onclick="window.location.href='{{route('book.show', $userBook->book->id)}}'">
                                @if($userBook->book->images->first())
                                    <img class="book-room"
                                         src="{{asset('storage/'.$userBook->book->images->first()->url)}}"
                                         alt="newbook">
                                @endif
                                <div class="book-short-info w-100 d-flex flex-column justify-content-between">
                                    <h5><b>{{ $userBook->book->title[$currentLang] }}</b></h5>

                                    <span class="description">
                                    {{ $userBook->book->description[$currentLang] }}
                                </span>
                                    <span class="author">• {{ $userBook->book->author->name[$currentLang] }}</span>
                                    <div class="reating-info">
                                        <div
                                            class="best-book-month-info d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                <span class='author'>@lang('site.ratting')</span>
                                                <div><img src="{{asset('img/icons/star.svg')}}" alt="star">
                                                    <b>{{ $userBook->book->ratting }} </b>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center flex-column">
                                                <span class="author">@lang('site.read_count')</span>
                                                <div><img class="me-2" src="{{asset('img/icons/heart.svg')}}"
                                                          alt="heart">
                                                    <b> {{ $userBook->book->readen_count }} @lang('site.count')</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="top-books  book-room-btn">
                                <button class="top-read-book"
                                        onclick="window.location.href='{{route('book.show', $userBook->book->id)}}'">
                                    @lang('site.read_book')
                                </button>
                                <button class="top-readen"
                                        onclick="window.location.href='{{route( 'mark.as.read', $userBook->book->id )}}'">
                                    @lang('site.mark_read')
                                </button>
                            </div>
                        </div>

                        <div class="author-container d-flex justify-content-between flex-row g-2"
                             onclick="window.location.href='{{route('author.books', $userBook->book->author->id)}}'">
                            @if($userBook->book->author->images->first())
                                <img class="book-room me-2"
                                     src="{{asset('storage/'.$userBook->book->author->images->first()->url)}}"
                                     alt="">
                            @endif
                            <div class="d-flex justify-content-around flex-column g-2 w-100">
                                <p style="margin-bottom: 0 !important;">{{ $userBook->book->author->name[$currentLang] }}</p>
                                <span
                                    class="author">• {{ $userBook->book->author->books->count() }} @lang('site.book_m')</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
