@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="all-categories">
        <h3>@lang('site.collections')</h3>
        <span class="author">@lang('site.collection_title')</span>

        <div class="genre-grid all-genres">
            @foreach($collections as $collection)
                <div class="all-genres-section">
                    <div class="genre-container">
                        @if($collection->images->first())
                            <img src="{{asset('storage/'. $collection->images->first()->url)}}" alt="">
                        @endif
                        <div class="genres-info">
                            <span class="author">• {{ $collection->name[$currentLang] }}</span><br>
                            <span class="author">{{ $collection->description[$currentLang] ?? ''}}</span><br>
                            <p>@lang('site.genre_book')<br>
                                <span>«{{ $collection->name[$currentLang] }}»</span>
                            </p>
                        </div>

                    </div>
                    <button class="btn" onclick="window.location.href='{{route('collection.books', $collection->id)}}'">
                        @lang('site.show_books')
                    </button>
                </div>
            @endforeach
        </div>

        <div class="category-container w-100">
            <h3>Рекомендуемые подборки</h3>
            <div class="swiper-category-container1">
                <div class="swiper-wrapper">
                    @foreach($collections->shuffle()->take(10) as $collection)
                        <div class="swiper-slide all-genres-section" style="width: 150px">
                            <div class="genre-container" style="width: 150px">
                                @if($collection->images->first())
                                    <img src="{{asset('storage/' . $collection->images->first()->url )}}" alt="">
                                @endif
                                <div class="genres-info">
                                    <span class="author">• {{ $collection->name[$currentLang] }}</span><br>
                                    <span class="author">{{ $collection->description[$currentLang] ?? ''}}</span><br>
                                    <p>@lang('site.genre_book')<br>
                                        <span>«{{ $collection->name[$currentLang] }}»</span>
                                    </p>
                                </div>
                            </div>
                            <button class="btn"
                                    onclick="window.location.href='{{ route('collection.books', $collection->id) }}'"
                                    style="width: 150px">
                                @lang('site.watch')
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="swiper-category-button-prev1"><img src="{{asset('img/icons/left.svg')}}" alt="left"></div>
                <div class="swiper-category-button-next1"><img src="{{asset('img/icons/right.svg')}}" alt="right"></div>
            </div>
        </div>


        @if($tags->count() > 0)
            <div class="all-books-container w-100">
                <h3>@lang('site.tags')</h3>
                <div class="all-books">
                    <ul>
                        @foreach($tags as $tag)
                            <li>
                                <button class="click">
                                    <a href="{{ route('tag.books', $tag->id) }}">
                                        {{ $tag->name[$currentLang] }}
                                    </a>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
