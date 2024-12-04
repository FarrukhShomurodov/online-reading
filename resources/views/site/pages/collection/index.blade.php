@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        <h3>Подборки</h3>
        <span class="author">Исследуйте уникальные подборки книг, собранные для вашего вдохновения. Найдите новые произведения, которые обязательно вам понравятся.</span>

        <div class="genre-grid all-genres">
            @foreach($collections as $collection)
                <div class="all-genres-section">
                    <div class="genre-container">
                        @if($collection->images->first())
                            <img src="{{asset('storage/'. $collection->images->first()->url)}}" alt="">
                        @endif
                        <div class="genres-info">
                            <span class="author">• {{ $collection->name['ru'] }}</span><br>
                            <span class="author">{{ $collection->description['ru'] ?? ''}}</span><br>
                            <p>Книги в жанре<br>
                                <span>«{{ $collection->name['ru'] }}»</span>
                            </p>
                        </div>

                    </div>
                    <button class="btn" onclick="window.location.href='{{route('collection.books', $collection->id)}}'">
                        Посмотреть
                        книги
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
                                    <span class="author">• {{ $collection->name['ru'] }}</span><br>
                                    <span class="author">{{ $collection->description['ru'] ?? ''}}</span><br>
                                    <p>Книги в жанре<br>
                                        <span>«{{ $collection->name['ru'] }}»</span>
                                    </p>
                                </div>
                            </div>
                            <button class="btn"
                                    onclick="window.location.href='{{ route('collection.books', $collection->id) }}'"
                                    style="width: 150px">
                                Посмотреть
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
                <h3>Теги</h3>
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
    </div>
@endsection
