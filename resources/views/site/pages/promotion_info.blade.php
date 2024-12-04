@php
    $currentLang = app()->getLocale();
@endphp

@extends('site.layouts.app')

@section('content')
    <div class="container all-categories">
        <div class="genres-book-info">
            <span class="d-flex align-items-center">
                <img src="{{asset('img/icons/chevron-left.svg')}}" alt="left" width="16px">
                <a href="{{ route('offer') }}">@lang('site.offer_promocodes') </a> / {{$promotion->title[$currentLang]}}
            </span>
        </div>
        <div class="d-flex justify-content-between flex-column news-show">
            @if($promotion->images->first())
                <img src="{{ asset('storage/' . $promotion->images->first()->url) }}">
            @endif
            <div class="all-categories">
                <h2>
                    {{ $promotion->title[$currentLang] }}
                </h2>
                <p class="top-book-desc">
                    {{ $promotion->description[$currentLang] }}
                </p>
                <div>
                    <b>@lang('site.validity_period')</b>
                    <i>
                        {{ \Carbon\Carbon::parse($promotion->start_time)->format('Y-m-d') }}
                        — {{ \Carbon\Carbon::parse($promotion->end_time)->format('Y-m-d') }}
                    </i>
                </div>
            </div>
        </div>
    </div>
@endsection
