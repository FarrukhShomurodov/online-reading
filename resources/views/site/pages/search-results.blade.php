@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <div class=" genres-book-info room-text d-block">
            <p style="margin-bottom: 0 !important;">Результаты поиска</p>
        </div>

        <div class="container">
            <h1></h1>
        </div>
        <div class="room-book ">
            @if($books->isEmpty() && $authors->isEmpty())
                <p>Ничего не найдено</p>
            @else
                <div class="d-flex justify-content-between gap-5 search-section w-100">
                    <div class="d-flex flex-column g-2">
                        <h3>Книги ({{$books->count()}})</h3>
                        @foreach($books as $book)
                            @if($book->is_active)
                                <div class="w-100">
                                    <div class="room-book-container"
                                         onclick="window.location.href='{{route('book.show', $book->id)}}'">
                                        <img class="book-room" src="{{asset('storage/'.$book->images->first()->url)}}"
                                             alt="">
                                        <div class="book-short-info d-flex flex-column justify-content-between">
                                            <h5><b>{{$book->title['ru']}}</b></h5>
                                            <span class="description">
                                            {{$book->description['ru']}}
                                        </span>
                                            <span class="author">• {{$book->author->name['ru']}}</span>
                                            <div class="reating-info">
                                                <div
                                                    class="best-book-month-info d-flex justify-content-between align-items-center">
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column">
                                                        <span class='author'>Рейтинг</span>
                                                        <div><img src="{{assert('img/icons/star.svg')}}" alt="">
                                                            <b>{{$book->ratting}}</b>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center align-items-center flex-column">
                                                        <span class="author">Прочитана (раз)</span>
                                                        <div><img class="me-2" src="{{asset('img/icons/heart.svg')}}"
                                                                  alt="heart">
                                                            <b>{{ $book->readen_count }} тыс</b>
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
                                        <button class="top-readen"
                                                onclick="window.location.href='{{route( 'mark.as.read', $book->id )}}'">
                                            Прочитана
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="flex-column g-2">
                        <h3>Авторы ({{$authors->count()}})</h3>
                        @foreach($authors as $author)
                            <div class="author-container d-flex justify-content-between flex-row g-2"
                                 onclick="window.location.href='{{route('author.books', $author->id)}}'">
                                @if($author->images->first())
                                    <img class="book-room me-2"
                                         src="{{asset('storage/'.$author->images->first()->url)}}"
                                         alt="">
                                @endif
                                <div class="d-flex justify-content-around flex-column g-2">
                                    <p>{{ $author->name['ru'] }}</p>
                                    <span class="author">• {{ $author->books->count() }} книг</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
