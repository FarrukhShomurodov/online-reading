@extends('site.layouts.app')

@section('content')

    <div class="container all-categories">
        @if(count($tag->books) == 0)
            <div class="not-found">
                <p>Упс! Мы не нашли ни одной книги.</p>
                <button onclick="window.location.href='{{ url()->previous() }}'">Назад</button>
            </div>
        @else
            <h3 style="padding-left: 0">Книги в теге “{{ $tag->name['ru'] }}”</h3>
            <div class="genre-grid all-genres">
                @foreach($tag->books as $book)
                    <div class="book-container">
                        <div>
                            <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                 height="244px">
                            <div class="book-container-content">
                                <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                <div class=book-container-ratting>
                                    <img src="{{ asset('/img/icons/star.svg') }}" alt=star""
                                         style="height: 15px !important;">
                                    <b>{{ $book->ratting }} </b>
                                </div>
                                <p>{{ $book->title['ru'] }}</p>
                            </div>
                        </div>
                        <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать книгу
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="category-container w-100">
                <h3>Популярные книги в теге </h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        @foreach($tag->books->shuffle()->take(10) as $book)
                            @if($book->is_active)
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{ asset('/img/icons/star.svg') }}" alt="star"
                                                     style="height: 15px !important;">
                                                <b>{{ $book->ratting }} </b>
                                            </div>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{ asset('/img/icons/star.svg') }}" alt="star"
                                                     style="height: 15px !important;">
                                                <b>{{ $book->ratting }} </b>
                                            </div>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{ asset('/img/icons/star.svg') }}" alt="star"
                                                     style="height: 15px !important;">
                                                <b>{{ $book->ratting }} </b>
                                            </div>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{ asset('/img/icons/star.svg') }}" alt="star"
                                                     style="height: 15px !important;">
                                                <b>{{ $book->ratting }} </b>
                                            </div>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt=""
                                             width="100%"
                                             height="244px">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <div class=book-container-ratting>
                                                <img src="{{ asset('/img/icons/star.svg') }}" alt="star"
                                                     style="height: 15px !important;">
                                                <b>{{ $book->ratting }} </b>
                                            </div>
                                            <p>{{ $book->title['ru'] }}</p>
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
                    <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left">
                    </div>
                    <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right">
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection