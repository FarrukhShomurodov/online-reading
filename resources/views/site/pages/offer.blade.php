@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        <h3>@lang('site.offer')</h3>
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
                <a class="offer-menu-item" href="{{route('about-us')}}">@lang('site.about_us')</a>
                <a class="offer-menu-item" href="{{route('offer')}}">@lang('site.offer')</a>
                <a class="offer-menu-item" href="#">@lang('site.rules')</a>
                <a class="offer-menu-item" href="#promocodes">@lang('site.promocodes')</a>
                <a class="offer-menu-item" href="#news">@lang('site.news')</a>
            </div>
        </div>


        @if($newsCategories->count() > 0)
            <h3 class="all-categories" id="news">@lang('site.news')</h3>
            @foreach($newsCategories as $category)
                <div class="all-categories">
                    <h5>{{$category->name[$currentLang]}}</h5>
                    <div class="genre-grid all-genres">
                        @foreach($category->news as $news)
                            <div class="all-genres-section">
                                <div class="genre-container">
                                    @if($news->images->first())
                                        <img src="storage/{{ $news->images->first()->url }}" alt="">
                                    @endif
                                    <div class="genres-info">
                                        <p>@lang('site.headline')<br>
                                            <span>«{{ $news->title[$currentLang] }}»</span>
                                        </p>
                                    </div>

                                </div>
                                <button class="btn" onclick="window.location.href='{{route('news', $news->id)}}'">
                                    @lang('site.watch')
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif

        @if($promocodes->count() > 0)
            <h3 class="all-categories" id="promocodes">@lang('site.promocodes')</h3>
            <div class="all-categories">
                <div class="genre-grid all-genres">
                    @foreach($promocodes as $promocode)
                        <div class="all-genres-section">
                            <div class="genre-container">
                                @if($promocode->images->first())
                                    <img src="storage/{{ $promocode->images->first()->url }}" alt="">
                                @endif
                                <div class="genres-info">
                                    <span class="author">{{ $promocode->description[$currentLang] ?? ''}}</span><br>
                                    <p>@lang('site.stock')<br>
                                        <span>«{{ $promocode->title[$currentLang] }}»</span>
                                    </p>
                                </div>

                            </div>
                            <button class="btn" onclick="window.location.href='{{route('promotion', $promocode->id)}}'">
                                @lang('site.watch')
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
