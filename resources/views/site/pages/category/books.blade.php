@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        @if(count($category->books->where('is_active', true)) == 0)
            <div class="not-found">
                <p>@lang('site.not_found_book')</p>
                <button onclick="window.location.href='{{ url()->previous() }}'">@lang('site.back')</button>
            </div>
        @else
            <h3 style="padding-left: 0">@lang('site.category_books') “{{ $category->name[$currentLang] }}”</h3>
            <span class="author">{{ $category->description[$currentLang] ?? '' }}</span>

            <div class="genre-grid all-genres">
                @foreach($category->books->where('is_active', true) as $book)
                    <div class="book-container">
                        <div>
                            @if($book->images->first())
                                <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                     height="244px">
                            @endif

                            <div class="book-container-content">
                                <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                <div class=book-container-ratting>
                                    <img src="{{asset('img/icons/star.svg')}}" alt="star"
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

            <div class="category-container w-100">
                <h3>@lang('site.category_popular_books')</h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        @foreach($category->books->shuffle()->take(10) as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                                 width="100%"
                                                 height="244px">
                                        @endif
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{asset('img/icons/star.svg')}}" alt="star"
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
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left">
                    </div>
                    <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right">
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
