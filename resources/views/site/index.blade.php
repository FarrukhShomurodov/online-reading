@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-books-container w-100">
        <p>@lang('site.all_books')</p>
        <div class="all-books">
            <ul>
                @foreach($categories as $category)
                    <li>
                        <button class="click">
                            <a href="{{ route('category.books', $category->id) }}">
                                {{ $category->name[$currentLang] }}
                            </a>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @if($collections->first()->books->where('is_active', true)->count() > 0)
        <div class="top-books d-flex justify-content-between align-items-center flex-wrap-reverse w-100">
            <div class="top-books-info d-flex flex-column justify-content-between align-items-start">
                <button class="top-btn">
                    {{ $collections->first()->name[$currentLang] }}
                </button>
                <div>
                    <span
                        class="author"
                        id="topBookAuthor">• {{ $collections->first()->books->where('is_active', true)->first()->author->name[$currentLang] }}</span><br>
                    <h2 id="topBookTitle">
                        {{ $collections->first()->books->where('is_active', true)->first()->title[$currentLang] }}
                    </h2>
                    <p class="top-book-desc" id="topBookInfo">
                        {{ $collections->first()->books->where('is_active', true)->first()->description[$currentLang] }}
                    </p>
                </div>
                <div>
                    <button class="top-read-book"
                            id="topBookRead"
                            onclick="window.location.href='{{route('book.show', $collections->first()->books->where('is_active', true)->first()->id)}}'">
                        Читать книгу
                    </button>
                    <button class="top-readen"
                            id="topBookMarkAsRead"
                            onclick="window.location.href='{{route( 'mark.as.read', $collections->first()->books->where('is_active', true)->first()->id )}}'">
                        Прочитана
                    </button>
                </div>
            </div>

            <!-- Slider -->
            <div class="slider">
                <button class="top-btn">
                    {{ $collections->first()->name[$currentLang] }}
                </button>
                <div class="top-books-collection">
                    <img class="crown" src="{{asset('/img/icons/crown.svg')}}" alt="">
                    <div class="d-flex flex-row swiper-container">
                        <div class="swiper-wrapper">
                            @foreach( $collections->first()->books->where('is_active', true) as $book)
                                <div class="top-book-container swiper-slide" data-id="{{ $book->id }}">
                                    @if($book->images->first())
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="">
                                    @endif
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                        <p>{{ $book->title[$currentLang] }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @foreach( $collections->first()->books->where('is_active', true) as $book)
                                <div class="top-book-container swiper-slide" data-id="{{ $book->id }}">
                                    @if($book->images->first())
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="">
                                    @endif
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                        <p>{{ $book->title[$currentLang] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="nav-slider">
                    <div class="swiper-button-prev"><img src="{{asset('img/icons/left.svg')}}" alt="left"></div>
                    <div class="swiper-button-next"><img src="{{asset('/img/icons/right.svg')}}" alt="right"></div>
                </div>
            </div>
        </div>
    @endif

    @php $placeNumber = 0; @endphp
    @foreach($categories->take(5) as $category)
        @if($category->books->count() > 0)
            @php $placeNumber++ @endphp
            <div class="category-container w-100">
                <h3>{{ $category->name[$currentLang]}}</h3>
                <div class="swiper-category-container{{$placeNumber}}">
                    <div class="swiper-wrapper">
                        @foreach($category->books as $book)
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
                                            <p>{{ $book->title[$currentLang] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="swiper-category-button-prev{{$placeNumber}}"><img src="{{asset('/img/icons/left.svg')}}"
                                                                                  alt="left"></div>
                    <div class="swiper-category-button-next{{$placeNumber}}"><img
                            src="{{asset('/img/icons/right.svg')}}"
                            alt="right"></div>
                </div>
            </div>
        @endif


        @if($placeNumber == 2 && $collections->find(2)->books->where('is_active', true)->count() > 0)
            @if($collections->find(2))
                <div class="best-book-month d-flex justify-content-between w-100">
                    <div class="d-flex top-books flex-column justify-content-between align-items-start">
                        <button class="top-btn">
                            {{ $collections->find(2)->name[$currentLang] }}
                        </button>
                        <div>
                        <span
                            class="author">•  {{ $collections->find(2)->books->where('is_active', true)->first()->author->name[$currentLang] }}</span><br>
                            <h2>
                                {{ $collections->find(2)->books->where('is_active', true)->first()->title[$currentLang] }}
                            </h2>
                            <p class="top-book-desc">
                                {{ $collections->find(2)->books->where('is_active', true)->first()->description[$currentLang] }}
                            </p>
                        </div>
                        <div>
                            <button class="top-read-book"
                                    onclick="window.location.href='{{route('book.show', $collections->find(2)->books->where('is_active', true)->first()->id)}}'">
                                Читать книгу
                            </button>
                            <button class="top-readen"
                                    onclick="window.location.href='{{route( 'mark.as.read', $collections->find(2)->books->where('is_active', true)->first()->id )}}'">
                                Прочитана
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-start">
                        @if($collections->find(2)->books->where('is_active', true)->first()->images)
                            <img class="best-book"
                                 src="{{ asset('storage/' . $collections->find(2)->books->where('is_active', true)->first()->images->first()->url) }}"
                                 alt=""
                                 height="518px" width="349px">

                        @endif

                        <div class="best-book-month-info">
                            <div>
                                <span class='author'>Рейтинг</span>
                                <div><img src="{{asset('/img/icons/star.svg')}}" alt="star">
                                    <b>{{ $collections->find(2)->books->where('is_active', true)->first()->ratting }} </b>
                                </div>
                            </div>
                            <div>
                                <span class="author">Прочитана (раз)</span>
                                <div><img class="me-2" src="{{asset('/img/icons/heart.svg')}}" alt="heart">
                                    <b> {{ $collections->find(2)->books->where('is_active', true)->first()->readen_count }}
                                        тыс</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-books-mobile">
                        <button class="top-btn">
                            {{ $collections->find(2)->name[$currentLang] }}
                        </button>
                    </div>
                </div>
            @endif
        @endif

        @if($placeNumber == 3 && $collections->find(3)->books->where('is_active', true)->count() > 0)
            @if($collections->find(3))
                <div class="top-readen-book-container d-flex justify-content-between align-items-center w-100">
                    <div class="top-readen-book d-flex justify-content-between flex-column align-items-start">
                        <button>Cамые читаемые книги</button>
                        <p>{{ $collections->find(3)->name[$currentLang] }}</p>
                        <span>
                     {{ $collections->find(3)->description[$currentLang]}}
                    </span>
                    </div>
                    <div class="category-container">
                        <div class="swiper-collection-container">
                            <div class="swiper-wrapper">
                                @foreach($collections->find(3)->books as $book)
                                    <div class="book-container swiper-slide">
                                        <div>
                                            @if($book->images->first())
                                                <img src="{{asset('storage/'. $book->images->first()->url)}}"
                                                     alt="{{ $book->title[$currentLang] }}">
                                            @endif
                                            <div class="book-container-content">
                                                <span
                                                    class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                                <p>{{ $book->title[$currentLang] }}</p>
                                            </div>
                                        </div>
                                        <button onclick="window.location.href='{{route('book.show', $book->id)}}'">
                                            Читать
                                            книгу
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="swiper-collection-container-prev"><img src="{{asset('/img/icons/left.svg')}}"
                                                                               alt="prev"></div>
                            <div class="swiper-collection-container-next"><img src="{{asset('/img/icons/right.svg')}}"
                                                                               alt="next"></div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if($placeNumber == 4 && $collections->find(4)->books->count() > 0)
            @if($collections->find(4))
                <div class="new-books w-100">
                    <button>
                        {{ $collections->find(4)->name[$currentLang] }}
                    </button>
                    <p>
                        {{ $collections->find(4)->description[$currentLang] }}
                    </p>

                    <div class="new-books-slide swiper-new-book-container">
                        <div class="swiper-wrapper">
                            @php $books = $collections->find(4)->books; @endphp
                            @foreach($books->chunk(2) as $bookPair)
                                <div class="swiper-slide">
                                    @foreach($bookPair as $book)
                                        <div class="new-book-container"
                                             onclick="window.location.href='{{route('book.show', $book->id)}}'">
                                            @if($book->images->first())
                                                <img src="{{asset('storage/'. $book->images->first()->url )}}" alt=""
                                                     width="161px"
                                                     height="100%">
                                            @endif
                                            <div class="book-container-content">
                                                <h3>{{ $book->title[$currentLang] }}</h3>
                                                <p>{{ $book->description[$currentLang] }}</p>
                                                <span class="author">• {{ $book->author->name[$currentLang] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-new-book-prev"><img src="{{asset('/img/icons/left.svg')}}" alt="prev"></div>
                        <div class="swiper-new-book-next"><img src="{{asset('/img/icons/right.svg')}}" alt="next"></div>
                    </div>
                </div>

                <div class="top-news-mobile category-container flex-column w-100">
                    <div class="swiper-top-book-container">
                        <div class="swiper-wrapper">
                            @foreach( $collections->find(4)->books as $book)
                                <div class="book-container swiper-slide">
                                    <div>
                                        @if($book->images->first())
                                            <img src="{{asset('storage/'.$book->images->first()->url)}}" alt="">
                                        @endif
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
                                            <p>{{ $book->title[$currentLang] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-top-book-container-prev"><img src="{{'/img/icons/left.svg'}}" alt="prev">
                        </div>
                        <div class="swiper-top-book-container-next"><img src="{{'img/icons/right.svg'}}" alt="next">
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endforeach

    @if($topGenres->count() > 0)
        <div class="top-genre w-100">
            <p class="top-genre-p">Топ жанры</p>
            <div class="genre-grid">
                @foreach($topGenres as $top)
                    <div class="genre-container"
                         onclick="window.location.href='{{ route('genre.books', $top->genre->id) }}'">
                        @if($top->genre->images->first())
                            <img src="{{asset('storage/' . $top->genre->images->first()->url)}}" alt="genre photo">
                        @endif
                        <div class="genres-info">
                            <span class="author">• {{ $top->genre->name[$currentLang] }}</span><br>
                            <span class="author">{{ $top->genre->description[$currentLang] ?? ''}}</span><br>
                            <p>Книги в жанре<br>
                                <span>«{{ $top->genre->name[$currentLang] }}»</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
