@extends('site.layouts.app')

@section('content')
    <div class="genres-book-info" style="padding-left: 0">
        {{--    <span class="d-flex align-items-center">--}}
        {{--        <img src="/img/icons/chevron-left.svg" alt="" width="16px">--}}
        {{--        <a href="{{ url('/') }}">Главная</a> / Поиск / {{ $book->title['ru'] }}--}}
        {{--    </span>--}}
    </div>


    <div class="about-book d-flex  justify-content-between">
        <img class="book"
             src="{{ asset('storage/' . $book->images->first()->url) }}">
        <div class="book-info top-books d-flex justify-content-between flex-column align-items-start">
            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
            <h2>
                {{ $book->title['ru'] }}
            </h2>
            <div>
                <button class="top-read-book" onclick="window.location.href='{{route('read.book', $book->id)}}'">
                    Читать книгу
                </button>
                <button class="top-readen">
                    Прочитана
                </button>
            </div>
            <p class="top-book-desc">
                {{ $book->description['ru'] }}
            </p>
            {{--        <button class="see-more">Показать полностью</button>--}}
        </div>

        <div class="d-flex justify-content-between">
            <img class="book-info-mobile"
                 src="{{ asset('storage/' . $book->first()->images->first()->url) }}">
            <div class="book-details d-flex flex-column justify-content-between align-items-start">
                <div class="best-book-month-info">
                    <div>
                        <span class='author'>Рейтинг</span>
                        <div><img src="{{asset('img/icons/star.svg')}}" alt="">
                            <b>{{ $book->ratting }} </b>
                        </div>
                    </div>
                    <div>
                        <span class="author">Прочитана (раз)</span>
                        <div><img class="me-2" src="{{asset('img/icons/heart.svg')}}" alt="">
                            <b> {{ $book->readen_count }} тыс</b>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <span class="author">Год:</span>
                        <b>{{ date('Y', strtotime($book->publication_date)) }}</b><br>
                    </div>
                    <div>
                        <span class="author">Жанр:</span>
                        <b>
                            {!!
                                 implode(', ', $book->genres->take(2)->map(function ($genre) {
                                     return '<a href="' . route('genre.books', $genre->id) . '">' . $genre->name['ru'] . '</a>';
                                 })->toArray()) .
                                 ($book->genres->count() > 2 ? '...' : '')
                             !!}
                        </b><br>
                    </div>
                    <div>
                        <span class="author">Бумажных страниц:</span><b> {{ $book->pages }}</b><br>
                    </div>

                    <div>
                        <span class="author">Теги:</span>
                        <b>
                            {!!
                                implode(', ', $book->tags->take(2)->map(function ($tag) {
                                  return '<a href="' . route('genre.books', $tag->id) . '">' . $tag->name['ru'] . '</a>';
                              })->toArray()) .
                              ($book->tags->count() > 2 ? '...' : '')
                          !!}
                        </b>
                        <br>
                    </div>
                </div>
                <button class="see-more">Оценить книгу</button>
            </div>
        </div>
    </div>

    <div class="category-container w-100">
        <h3>Похожие книги </h3>
        <div class="swiper-category-container1">
            <div class="swiper-wrapper">
                @foreach($books->shuffle()->take(10) as $book)
                    @if($book->is_active)
                        <div class="book-container swiper-slide">
                            <div>
                                <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                     height="244px">
                                <div class="book-container-content">
                                    <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                    <p>{{ $book->title['ru'] }}</p>
                                </div>
                            </div>
                            <button onclick="window.location.href='{{route('book.show', $book->id)}}'"> Читать книгу
                            </button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left"></div>
            <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right"></div>
        </div>
    </div>

    <div class="reviews-container">
        <h3>Отзывы</h3>
        @foreach($reviews as $review)
            <div class="reviews">
                <div class="review-header">
                    <div class="review-rating">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $review->ratting)
                                <span class="star filled">&#9733;</span>
                            @else
                                <span class="star">&#9733;</span>
                            @endif
                        @endfor
                    </div>
                    <span class="review-user">{{ $review->name }}</span>
                </div>
                <p class="review-text">{{ $review->text }}</p>
                <span class="review-date">{{ $review->created_at->format('d.m.Y H:i') }}</span>
            </div>
        @endforeach
    </div>


    @if(auth()->guard('user')->user())
        <div class="category-container review">
            <h3>Сообщение <span style="color: rgba(239, 79, 79, 1)">*</span></h3>
            <form action="{{ route('review.store') }}" method="post"
                  class="d-flex justify-content-between align-items-start flex-column w-100">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <input type="hidden" name="ratting" id="ratting" value="0">
                <input type="hidden" name="user_id" value="{{ auth()->guard('user')->user()->id }}">

                <!-- Рейтинг звезд -->
                <div class="star-rating">
                    <span data-value="5" class="star">&#9733;</span>
                    <span data-value="4" class="star">&#9733;</span>
                    <span data-value="3" class="star">&#9733;</span>
                    <span data-value="2" class="star">&#9733;</span>
                    <span data-value="1" class="star">&#9733;</span>
                </div>

                <textarea name="text" placeholder="Напишите ваш отзыв..."></textarea>
                <button>Отправить</button>
            </form>
        </div>
    @endif
@endsection
