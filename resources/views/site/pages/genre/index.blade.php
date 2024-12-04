@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <h3>@lang('site.genres_h')</h3>
        <span class="author">@lang('site.genres_title')</span>

        <div class="genre-grid all-genres">
            @foreach($genres as $genre)
                <div class="all-genres-section">
                    <div class="genre-container">
                        @if($genre->images->first())
                            <img src="{{asset('storage/'.$genre->images->first()->url)}}" alt="">
                        @endif
                        <div class="genres-info">
                            <span class="author">• {{ $genre->name['ru'] }}</span><br>
                            <span class="author">{{ $genre->description['ru'] ?? ''}}</span><br>
                            <p>@lang('site.genre_book')<br>
                                <span>«{{ $genre->name['ru'] }}»</span>
                            </p>
                        </div>

                    </div>
                    <button class="btn"
                            onclick="window.location.href='{{route('genre.books', $genre->id)}}'">@lang('site.show_books')
                    </button>
                </div>
            @endforeach
        </div>

        @if($collections->find(5)->books->count() > 0)
            <div class="category-container w-100">
                <h3>{{ $collections->find(5)->name['ru']}}</h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        @foreach($collections->find(5)->books as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                                 width="100%"
                                                 height="244px">
                                        @endif

                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button
                                        onclick="window.location.href='{{route('book.show', $book->id)}}'">@lang('site.show_books')
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


        @if($tags->count() > 0)
            <div class="all-books-container w-100">
                <h3>@lang('site.tags')</h3>
                <div class="all-books">
                    <ul>
                        @foreach($tags as $tag)
                            <li>
                                <button class="click">
                                    <a href="{{ route('tag.books', $tag->id) }}">
                                        {{ $tag->name['ru'] }}
                                    </a>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif


        @if($collections->find(6)->books->count() > 0)
            <div class="category-container w-100">
                <h3>{{ $collections->find(6)->name['ru']}}</h3>
                <div class="swiper-category-container2">
                    <div class="swiper-wrapper">
                        @foreach($collections->find(6)->books as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                                 width="100%"
                                                 height="244px">
                                        @endif

                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button
                                        onclick="window.location.href='{{route('book.show', $book->id)}}'"> @lang('site.show_books')
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev2"><img src="{{asset('img/icons/left.svg')}}" alt="left">
                    </div>
                    <div class="swiper-category-button-next2"><img src="{{asset('img/icons/right.svg')}}" alt="right">
                    </div>
                </div>
            </div>
        @endif

        @if($collections->find(7)->books->count() > 0)
            <div class="top-genre w-100">
                <p class="top-genre-p">{{ $collections->find(7)->name['ru']}}</p>
                <div class="genre-grid">
                    @foreach($collections->find(7)->books as $book)
                        @if($book->is_active)
                            <div class="book-container swiper-slide">
                                <div>
                                    @if($book->images->first())
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                    @endif

                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                        <p>{{ $book->title['ru'] }}</p>
                                    </div>
                                </div>
                                <button
                                    onclick="window.location.href='{{route('book.show', $book->id)}}'"> @lang('site.show_books')
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
