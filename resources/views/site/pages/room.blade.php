@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div class=" genres-book-info room-text d-block">
            <p style="margin-bottom: 0 !important;">Кабинет</p>
            <span class="author">Добро пожаловать, Анна!</span>
        </div>

        <div class="d-flex flex-row align-items-start cabinet-menu">
            <button class="cabinet-menu-item cabinet-menu-active">Мои книги</button>
            <button class="cabinet-menu-item">Прочтенные</button>
        </div>

        <div class="room-book">
            @foreach($books as $book)
                <div class="d-flex flex-row align-items-start gap-5">
                    <div>
                        <div class="room-book-container"
                             onclick="window.location.href='{{route('book.show', $book->id)}}'">
                            @if($book->book->images->first())
                                <img class="book-room" src="{{asset('storage/'.$book->book->images->first()->url)}}"
                                     alt="newbook">
                            @endif
                            <div class="book-short-info d-flex flex-column justify-content-between">
                                <h5><b>{{ $book->book->title['ru'] }}</b></h5>

                                <span class="description">
                                    {{ $book->book->description['ru'] }}
                                </span>
                                <span class="author">• {{ $book->book->author->name['ru'] }}</span>
                                <div class="reating-info">
                                    <div class="best-book-month-info d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <span class='author'>Рейтинг</span>
                                            <div><img src="{{asset('img/icons/star.svg')}}" alt="star">
                                                <b>{{ $book->book->ratting }} </b>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center flex-column">
                                            <span class="author">Прочитана (раз)</span>
                                            <div><img class="me-2" src="{{asset('img/icons/heart.svg')}}" alt="heart">
                                                <b> {{ $book->book->readen_count }} тыс</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="top-books  book-room-btn">
                            <button class="top-read-book"
                                    onclick="window.location.href='{{route('book.show', $book->id)}}'">
                                Читать книгу
                            </button>
                            <button class="top-readen">
                                Прочитана
                            </button>
                        </div>
                    </div>

                    <div class="author-container d-flex justify-content-between flex-row g-2"
                         onclick="window.location.href='{{route('author.books', $book->book->author->id)}}'">
                        @if($book->book->author->images->first())
                            <img class="book-room me-2"
                                 src="{{asset('storage/'.$book->book->author->images->first()->url)}}"
                                 alt="">
                        @endif
                        <div class="d-flex justify-content-around flex-column g-2">
                            <p>{{ $book->book->author->name['ru'] }}</p>
                            <span class="author">• {{ $book->book->author->books->count() }} книг</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
