@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        @if(count($collection->books->where('is_active', true)) == 0)
            <div class="not-found">
                <p>@lang('site.not_found_book')</p>
                <button onclick="window.location.href='{{ url()->previous() }}'">@lang('site.back')</button>
            </div>
        @else
            <div class="d-flex justify-content-between align-items-center">
                <h3 style="padding-left: 0">@lang('site.collection_books') “{{ $collection->name[$currentLang] }}”</h3>

                <button class="btn btn-link collapsed" style="color: #FFB539; text-decoration: none" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#filtersCollapse">
                    <i class="bx bx-filter-alt"></i> Фильтры
                </button>
            </div>

            <span class="author">{{$collection->description[$currentLang] ?? ''}}</span>

            <div id="filtersCollapse" class="collapse
            @if(request('rating') || request('author_id')) show @endif">
                <div class="card-body">
                    <form method="GET"
                          class="filter d-flex flex-row flex-wrap align-items-center gap-2">
                        <div class="w-100 d-flex flex-column form-group">
                            <label for="author">Авторы</label>
                            <select id="author" name="author_id"
                                    class="form-control select2" style="height: 50px !important;">
                                @foreach($authors as $author)
                                    <option
                                        value="{{$author->id}}" @selected(request('author_id') == $author->id)>{{$author->name[$currentLang]}}</option>
                                @endforeach
                                <option value="">Все</option>
                            </select>
                        </div>
                        <div class="w-100 d-flex flex-column form-group">
                            <label for="rating">Рейтинг</label>
                            <select id="rating" name="rating"
                                    class="form-control select2">
                                <option value="5" @selected(request('rating') == 5)>5</option>
                                <option value="4" @selected(request('rating') == 4)>4</option>
                                <option value="3" @selected(request('rating') == 3)>3</option>
                                <option value="2" @selected(request('rating') == 2)>2</option>
                                <option value="1" @selected(request('rating') == 1)>1</option>
                                <option value="0" @selected(request('rating') == 0)>0</option>
                                <option value="">Все</option>
                            </select>
                        </div>
                        <button class="w-100" type="submit">Применить</button>
                    </form>
                </div>
            </div>

            <div class="genre-grid all-genres">

                @foreach($books as $book)
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
                <h3>@lang('site.recommended_books_in_collection')</h3>
                <div class="swiper-category-container1">
                    <div class="swiper-wrapper">
                        @foreach($books->shuffle()->take(10) as $book)
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
