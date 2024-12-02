<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flow</title>

    {{-- Cache CSS --}}
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    {{-- flipbook --}}
    <script src="{{ asset('flipbook/source/js/magalone.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('flipbook/source/css/magalone.min.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('flipbook/source/css/fonts.min.css') }}" type="text/css" rel="stylesheet"/>
</head>
<body>

<div id="preloader">
    <div class="spinner"></div>
</div>

@include('site.layouts.header')

<main class="container">
    @yield('content')
</main>

{{-- Cache Footer --}}
@php
    $cachedFooter = Cache::remember('site_footer', now()->addHours(1), function () {
        return view('site.layouts.footer')->render();
    });
@endphp

{!! $cachedFooter !!}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- Main JS -->
<script src="{{ mix('site_js/swiper.js') }}"></script>
<script src="{{ mix('site_js/main.js') }}"></script>

@yield('scripts')

@if(isset($collections) && $collections->isNotEmpty())
    {{--    @php--}}
    {{--        $swiperParams = Cache::remember('swiper.params', 3600, function () use ($collections) {--}}
    {{--            $booksCount = $collections->first()->books->count();--}}
    {{--            return [--}}
    {{--                'slidesPerView' => ,--}}
    {{--                'initialSlide' => ,--}}
    {{--            ];--}}
    {{--        });--}}
    {{--    @endphp--}}
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            slidesPerView: {{ $booksCount * 2 }},
            centeredSlides: true,
            spaceBetween: -3,
            initialSlide: {{ round($booksCount / 2) + 1 }},
            effect: 'coverflow',
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            speed: 500,
        });
    </script>
@endif

</body>
</html>
