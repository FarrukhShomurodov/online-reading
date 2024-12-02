@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        <h3>Оффета</h3>
        <div class="offer-section d-flex flex-row gap-5">
            <div class="offer-section-content"> Lorem ipsum dolor sit amet consectetur. Et lorem integer vestibulum.
                Lorem ipsum dolor sit amet consectetur. Vitae massa elementum malesuada quis. Sit vitae volutpat
                ultricies
                sed purus cras quam consectetur purus. Adipiscing faucibus adipiscing vel tincidunt sed auctor. Leo et
                pellentesque adipiscing aenean est lorem. Vitae ut senectus imperdiet ut tempor. Non enim dolor sed eu
                vitae
                ultricies eleifend. Duis ante facilisis ullamcorper quis lorem habitant sapien. Bibendum dui etiam neque
                donec libero quis eget. Velit eleifend nibh nulla nulla quam.
                Lorem ipsum dolor sit amet consectetur. Et lorem integer vestibulum.
                Lorem ipsum dolor sit amet consectetur. Vitae massa elementum malesuada quis. Sit vitae volutpat
                ultricies
                sed purus cras quam consectetur purus. Adipiscing faucibus adipiscing vel tincidunt sed auctor. Leo et
                pellentesque adipiscing aenean est lorem. Vitae ut senectus imperdiet ut tempor. Non enim dolor sed eu
                vitae
                ultricies eleifend. Duis ante facilisis ullamcorper quis lorem habitant sapien. Bibendum dui etiam neque
                donec libero quis eget. Velit eleifend nibh nulla nulla quam.
                Lorem ipsum dolor sit amet consectetur. Et lorem integer vestibulum.
                Lorem ipsum dolor sit amet consectetur. Vitae massa elementum malesuada quis. Sit vitae volutpat
                ultricies
                sed purus cras quam consectetur purus. Adipiscing faucibus adipiscing vel tincidunt sed auctor. Leo et
                pellentesque adipiscing aenean est lorem. Vitae ut senectus imperdiet ut tempor. Non enim dolor sed eu
                vitae
                ultricies eleifend. Duis ante facilisis ullamcorper quis lorem habitant sapien. Bibendum dui etiam neque
                donec libero quis eget. Velit eleifend nibh nulla nulla quam.
            </div>

            {{--        offer-menu-item-active--}}

            <div class="offer-section-menu d-flex gap-2">
                <a class="offer-menu-item" href="{{route('about-us')}}">О нас</a>
                <a class="offer-menu-item" href="{{route('offer')}}">Офферта</a>
                <a class="offer-menu-item" href="#">Правила</a>
                <a class="offer-menu-item" href="#promocodes">Акции</a>
                <a class="offer-menu-item" href="#news">Новости</a>
            </div>
        </div>


        @if($newsCategories->count() > 0)
            <h3 class="all-categories" id="news">Новости</h3>
            @foreach($newsCategories as $category)
                <div class="all-categories">
                    <h5>{{$category->name['ru']}}</h5>
                    <div class="genre-grid all-genres">
                        @foreach($category->news as $news)
                            <div class="all-genres-section">
                                <div class="genre-container">
                                    @if($news->images->first())
                                        <img src="storage/{{ $news->images->first()->url }}" alt="">
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
            @endforeach
        @endif

        @if($promocodes->count() > 0)
            <h3 class="all-categories" id="promocodes">Акции</h3>
            <div class="all-categories">
                <div class="genre-grid all-genres">
                    @foreach($promocodes as $promocode)
                        <div class="all-genres-section">
                            <div class="genre-container">
                                @if($promocode->images->first())
                                    <img src="storage/{{ $promocode->images->first()->url }}" alt="">
                                @endif
                                <div class="genres-info">
                                    <span class="author">{{ $promocode->description['ru'] ?? ''}}</span><br>
                                    <p>Акция<br>
                                        <span>«{{ $promocode->title['ru'] }}»</span>
                                    </p>
                                </div>

                            </div>
                            <button class="btn" onclick="window.location.href='{{route('promotion', $promocode->id)}}'">
                                Посмотреть
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
