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

@php
    $currentLang = app()->getLocale();
@endphp

<div id="preloader">
    <div class="spinner"></div>
</div>

@include('site.layouts.header')

<main class="container">
    @if(session()->has('add_mark_as_read_success'))
        <div class="review-alert">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <div class="d-flex flex-column">
                    <h5>@lang('site.book_marked.title')</h5>
                    <p>@lang('site.book_marked.message')</p>
                </div>
                <div class="not-found" style="padding: 0 !important;">
                    <button id="hideAlert">@lang('site.close')</button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger rounded shadow-sm p-3 d-flex flex-column gap-2 w-100"
             style="margin: 20px auto; font-size: 14px;">
            @foreach ($errors->all() as $error)
                <div class="d-flex align-items-center gap-2">
                    <i class="bx bx-error-circle text-danger fs-5"></i>
                    <span>{{ $error }}</span>
                </div>
            @endforeach
            <button type="button" class="btn-close align-self-end mt-2" data-bs-dismiss="alert" aria-label="Close"
                    style="outline: none; box-shadow: none;"></button>
        </div>
    @endif
    @yield('content')
</main>

{{-- Cache Footer --}}
{{--@php--}}
{{--    $cachedFooter = Cache::remember('site_footer', now()->addHours(1), function () {--}}
{{--        return view('site.layouts.footer')->render();--}}
{{--    });--}}
{{--@endphp--}}

{{--{!! $cachedFooter !!}--}}

@include('site.layouts.footer')


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

<script>
    const locale = '{{ $currentLang }}';
    const text = {
        'uz': {
            'hoverText': "O'qish",
            'defaultText': "Kitobni o'qish",
        },
        'ru': {
            'hoverText': 'Читать',
            'defaultText': 'Читать книгу',
        },
    };

    $('.top-read-book').hover(
        function () {
            $(this).text(text[locale].hoverText);
        },
        function () {
            $(this).text(text[locale].defaultText);
        }
    );
</script>

@if(isset($collections) && $collections->isNotEmpty())
    @php
        $booksCount = $collections->first()->books->count();
    @endphp
    <script>
        const bookCache = {};
        let isFetching = false;

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
            on: {
                slideChange: function () {
                    const activeSlide = this.slides[this.activeIndex];
                    const bookId = activeSlide.dataset.id;

                    if (bookId) {
                        if (!bookCache[bookId] && !isFetching) {
                            fetchBookData(bookId);
                        } else if (bookCache[bookId]) {
                            updateBookInfo(bookCache[bookId]);
                        }
                    }
                },
            },
        });

        function fetchBookData(bookId) {
            isFetching = true;

            fetch(`/api/book/${bookId}`)
                .then(response => response.json())
                .then(data => {
                    bookCache[bookId] = data;
                    updateBookInfo(data);
                    console.log(data);
                })
                .catch(error => {
                    console.error('Ошибка загрузки данных:', error);
                })
                .finally(() => {
                    isFetching = false;
                });
        }

        function updateBookInfo(data) {
            const locale = '{{ $currentLang }}'
            const authorName = data.author ? data.author.name[locale] : 'Unknown Author';
            const title = data.title[locale] || 'Untitled';
            const description = data.description[locale] || 'No description available';

            document.getElementById('topBookAuthor').textContent = `• ${authorName}`;
            document.getElementById('topBookTitle').textContent = title;
            document.getElementById('topBookInfo').textContent = description;

            document.getElementById('topBookRead').onclick = () => {
                window.location.href = `/book/${data.id}`;
            };
            document.getElementById('topBookMarkAsRead').onclick = () => {
                window.location.href = `/mark-as-read/${data.id}`;
            };
        }
    </script>
@endif

</body>
</html>
