@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        <div class="genres-book-info">
            <span class="d-flex align-items-center">
                <img src="{{asset('img/icons/chevron-left.svg')}}" alt="" width="16px">
                <a href="{{ route('offer') }}">Оффер / Новости </a> / {{$news->category->name['ru']}} / {{ $news->title['ru'] }}
            </span>
        </div>
        <div class="d-flex justify-content-between flex-column news-show">
            @if( $news->images->first())
                <img src="{{ asset('storage/' . $news->images->first()->url) }}">
            @endif
            <div class="all-categories">
                <h2>
                    {{ $news->title['ru'] }}
                </h2>
                <p class="top-book-desc">
                    {{ $news->text['ru'] }}
                </p>
            </div>
        </div>

        <div class="all-categories">
            <h4>{{$news->category->name['ru']}}</h4>
            <div class="genre-grid all-genres">
                @foreach($news->category->news as $news)
                    <div class="all-genres-section">
                        <div class="genre-container">
                            @if($news->images->first())
                                <img src="{{ asset('storage/'.$news->images->first()->url) }}" alt="">
                            @endif
                            <div class="genres-info">
                                <p>Новость<br>
                                    <span>«{{ $news->title['ru'] }}»</span>
                                </p>
                            </div>

                        </div>
                        <button class="btn" onclick="window.location.href='{{route('news', $news->id)}}'">
                            Посмотреть
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection