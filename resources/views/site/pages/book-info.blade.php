@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <!-- Модальное окно -->
    @if(session()->has('review_success'))
        <div class="review-alert">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <div class="d-flex flex-column">
                    <h5>@lang('site.thank_you_review')</h5>
                    <p>@lang('site.review_success')</p>
                </div>
                <div class="not-found" style="padding: 0 !important;">
                    <button id="hideAlert">@lang('site.close')</button>
                </div>
            </div>
        </div>
    @endif

    <div class="genres-book-info" style="padding-left: 0">
        {{--    <span class="d-flex align-items-center">--}}
        {{--        <img src="/img/icons/chevron-left.svg" alt="" width="16px">--}}
        {{--        <a href="{{ url('/') }}">Главная</a> / Поиск / {{ $book->title[$currentLang] }}--}}
        {{--    </span>--}}
    </div>


    <div class="about-book d-flex  justify-content-between">
        @if($book->images->first())
            <img class="book"
                 src="{{ asset('storage/' . $book->images->first()->url) }}">
        @endif
        <div class="book-info top-books d-flex justify-content-between flex-column align-items-start">
            <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
            <h2>
                {{ $book->title[$currentLang] }}
            </h2>
            <div>
                <button class="top-read-book" onclick="window.location.href='{{route('read.book', $book->id)}}'">
                    @lang('site.read_book')
                </button>
                <button class="top-readen" onclick="window.location.href='{{route( 'mark.as.read', $book->id )}}'">
                    @lang('site.mark_read')
                </button>
            </div>
            <p class="top-book-desc">
                {{ $book->description[$currentLang] }}
            </p>
            {{--        <button class="see-more">Показать полностью</button>--}}
        </div>

        <div class="d-flex justify-content-between">
            @if($book->images->first())
                <img class="book-info-mobile"
                     src="{{ asset('storage/' . $book->images->first()->url) }}">
            @endif
            <div class="book-details d-flex flex-column justify-content-between align-items-start">
                <div class="best-book-month-info">
                    <div>
                        <span class='author'>@lang('site.ratting')</span>
                        <div><img src="{{asset('img/icons/star.svg')}}" alt="">
                            <b>{{ $book->ratting }} </b>
                        </div>
                    </div>
                    <div>
                        <span class="author">@lang('site.read_count')</span>
                        <div><img class="me-2" src="{{asset('img/icons/heart.svg')}}" alt="">
                            <b> {{ $book->readen_count }} @lang('site.count')</b>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <span class="author">@lang('site.year')</span>
                        <b>{{ date('Y', strtotime($book->publication_date)) }}</b><br>
                    </div>
                    <div>
                        <span class="author">@lang('site.genre')</span>
                        <b>
                            {!!
                                 implode(', ', $book->genres->take(2)->map(function ($genre) use ($currentLang){
                                     return '<a href="' . route('genre.books', $genre->id) . '">' . $genre->name[$currentLang] . '</a>';
                                 })->toArray()) .
                                 ($book->genres->count() > 2 ? '...' : '')
                             !!}
                        </b><br>
                    </div>
                    <div>
                        <span class="author">@lang('site.pages')</span><b> {{ $book->pages }}</b><br>
                    </div>

                    <div>
                        <span class="author">@lang('site.tags'):</span>
                        <b>
                            {!!
                                implode(', ', $book->tags->take(2)->map(function ($tag) use ($currentLang) {
                                  return '<a href="' . route('genre.books', $tag->id) . '">' . $tag->name[$currentLang] . '</a>';
                              })->toArray()) .
                              ($book->tags->count() > 2 ? '...' : '')
                          !!}
                        </b>
                        <br>
                    </div>
                </div>
                <button class="see-more"><a href="#send_review">@lang('site.rate_the_book')</a></button>
            </div>
        </div>
    </div>

    <div class="category-container w-100">
        <h3>@lang('site.similar_book') </h3>
        <div class="swiper-category-container1">
            <div class="swiper-wrapper">
                @foreach($books->shuffle()->take(10) as $book)
                    @if($book->is_active)
                        <div class="book-container swiper-slide">
                            <div>
                                <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                     height="244px">
                                <div class="book-container-content">
                                    <span class="author">• {{ $book->author->name[$currentLang] }}</span><br>
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
            <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left"></div>
            <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right"></div>
        </div>
    </div>

    @if($reviews ->count() > 0 )
        <div class="category-container reviews-container">
            <h3>@lang('site.reviews')</h3>
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

    @endif

    <div class="category-container review">
        <h3>@lang('site.messages')</h3>
        @if(auth()->guard('user')->check())
            <form id="send_review" action="{{ route('review.store') }}" method="post"
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

                <textarea name="text" id="reviewText" placeholder="{{ __('site.review_title') }}"
                          maxlength="600"></textarea>
                <small>@lang('site.characters_left'): <span id="charCount"> 600</span></small>
                <button>@lang('site.send')</button>
            </form>
        @else
            <p class="text-center text-muted mb-3">
                {!! __('site.review_rule') !!}
            </p>
        @endif
    </div>
@endsection
