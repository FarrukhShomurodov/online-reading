<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
          rel="stylesheet">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
</head>

<body>
<header class="desctop justify-content-between align-items-center">
    <img src="{{asset('img/logo.png')}}" alt="logo" width="70px" height="27px"
         onclick="window.location.href='{{url('/')}}'">
    <div class="container d-flex justify-content-between align-items-center">
        <ul class="menu">
            <li class="menu-item active" style="margin-left: 0 !important;"
                onclick="window.location.href='{{url('/')}}'">Главная
            </li>
            <li class="menu-item" onclick="window.location.href='{{url('categories')}}'">Все категории</li>
            <li class="menu-item" onclick="window.location.href='{{url('genres')}}'">Все жанры</li>
            <li class="menu-item" onclick="window.location.href='{{url('collections')}}'">Подборки</li>
            <li class="menu-item" onclick="window.location.href='{{route('contacts')}}'">Контакты</li>
            <li class="menu-item">Оферта</li>
            <li class="menu-item">О нас</li>
        </ul>

        <div class="search-container">
            <img class="search-icon" src="{{asset('img/icons/search.svg')}}" alt="search">
            <input class="search" type="text" placeholder="Книга, автор">
            <img class="cross-icon" src="{{asset('img/icons/cross.svg')}}" alt="cross">
        </div>
        <div class="custom-select-container">
            <div class="custom-select">
                <div class="custom-select-selected">
                    <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option">
                        <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                    </div>
                    <div class="custom-select-option">
                        <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user-ava d-flex justify-content-center align-items-center"
         onclick="window.location.href='/'"><span>F</span></div>
</header>

<header class="mobile-device align-items-center">
    <div class="container d-flex justify-content-between flex-row align-items-center w-100">
        <img src="{{asset('img/logo.png')}}" alt="logo" width="70px" height="27px"
             onclick="window.location.href='{{url('/')}}'">

        <div class="menu-mobile-nav">
            <img class="search-icon-mobile" src="{{asset('img/icons/search.svg')}}" alt="">
            <div class="user-ava d-flex justify-content-center align-items-center"
                 onclick="window.location.href='/'"><span>F</span></div>
            <img class="menu-icon" src="{{asset('img/icons/menu.svg')}}" alt="">
        </div>
    </div>
</header>

<div class="search-container search-mobile container">
    <img class="search-icon" src="{{asset('img/icons/search.svg')}}" alt="search">
    <input class="search" type="text" placeholder="Книга, автор">
    <img class="cross-icon" src="{{asset('img/icons/cross.svg')}}" alt="cross">
</div>

<!-- popuop menu -->
<div class="menu-mobile-active">
    <div class="d-flex justify-content-between align-items-cente w-100">
        <div class="custom-select">
            <div class="custom-select-selected">
                <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option">
                    <img src="{{asset('img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                </div>
                <div class="custom-select-option">
                    <img src="{{asset('img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                </div>
            </div>
        </div>
        <img src="{{asset('img/menu-logo.png')}}" alt="logo" width="99px" height="38px">
        <img class="close-menu" src="{{ asset('img/icons/cross.svg') }}" alt="" width="36px" height="36px">
    </div>
    <ul class="menu d-flex justify-content-center align-items-cente flex-column">
        <li class="menu-item" onclick="window.location.href='{{url('/')}}'">Главная</li>
        <li class="menu-item" onclick="window.location.href='{{url('categories')}}'">Все категории</li>
        <li class="menu-item" onclick="window.location.href='{{url('genres')}}'">Все жанры</li>
        <li class="menu-item" onclick="window.location.href='{{url('collections')}}'">Подборки</li>
        <li class="menu-item" onclick="window.location.href='{{route('contacts')}}'">Контакты</li>
        <li class="menu-item">Оферта</li>
        <li class="menu-item">О нас</li>
    </ul>

    <button>Мои книги</button>
</div>

<main class="container">
    <div class="all-books-container w-100">
        <p>Все книги</p>
        <div class="all-books">
            <ul>
                @foreach($categories as $category)
                    <li>
                        <button class="click">
                            <a href="{{ route('category-books', $category->id) }}">
                                {{ $category->name['ru'] }}
                            </a>
                        </button>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    @if($collections->first())
        <div class="top-books d-flex justify-content-between align-items-center flex-wrap-reverse w-100">
            <div class="top-books-info d-flex flex-column justify-content-between align-items-start">
                <button class="top-btn">
                    {{ $collections->first()->name['ru'] }}
                </button>
                <div>
                    <span class="author">• {{ $collections->first()->books->first()->author->name['ru'] }}</span><br>
                    <h2>
                        {{ $collections->first()->books->first()->title['ru'] }}
                    </h2>
                    <p class="top-book-desc">
                        {{ $collections->first()->books->first()->description['ru'] }}
                    </p>
                </div>
                <div>
                    <button class="top-read-book"
                            onclick="window.location.href='{{route('book-show', $collections->first()->books->first()->id)}}'">
                        Читать книгу
                    </button>
                    <button class="top-readen">
                        Прочитана
                    </button>
                </div>
            </div>

            <!-- Slider -->
            <div class="slider">
                <button class="top-btn">
                    {{ $collections->first()->name['ru'] }}
                </button>
                {{--                        <div class="swiper-button-prev"><img src="{{asset('img/icons/left.svg')}}" alt=""></div>--}}
                <div class="top-books-collection">
                    <img class="crown" src="{{asset('/img/icons/crown.svg')}}" alt="">
                    <div class="d-flex flex-row swiper-container">
                        <div class="swiper-wrapper">
                            @foreach( $collections->first()->books as $book)
                                <div class="top-book-container swiper-slide">
                                    <img src="storage/{{$book->images->first()->url}}" alt="">
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                        <p>{{ $book->title['ru'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @foreach( $collections->first()->books as $book)
                                <div class="top-book-container swiper-slide">
                                    <img src="storage/{{$book->images->first()->url}}" alt="">
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                        <p>{{ $book->title['ru'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{--                            <div class="top-book-container swiper-slide">--}}
                            {{--                                <img--}}
                            {{--                                    src="storage/{{$collections->first()->books->first()->images->first()->url}}"--}}
                            {{--                                    alt="">--}}
                            {{--                                <div class="book-container-content">--}}
                            {{--                                    <span--}}
                            {{--                                        class="author">• {{ $collections->first()->books->first()->author->name['ru'] }}</span><br>--}}
                            {{--                                    <p>{{ $collections->first()->books->first()->title['ru'] }}</p>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="top-book-container swiper-slide">--}}
                            {{--                                <img--}}
                            {{--                                    src="storage/{{$collections->first()->books->last()->images->first()->url}}"--}}
                            {{--                                    alt="">--}}
                            {{--                                <div class="book-container-content">--}}
                            {{--                                    <span--}}
                            {{--                                        class="author">• {{ $collections->first()->books->last()->author->name['ru'] }}</span><br>--}}
                            {{--                                    <p>{{ $collections->first()->books->last()->title['ru'] }}</p>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                {{--            <div class="swiper-button-next"><img src="img/icons/right.svg" alt=""></div>--}}

                <div class="nav-slider">
                    <div class="swiper-button-prev"><img src="{{asset('img/icons/left.svg')}}" alt=""></div>
                    <div class="swiper-button-next"><img src="img/icons/right.svg" alt=""></div>
                </div>
            </div>
        </div>
    @endif

    @php $placeNumber = 0; @endphp
    @foreach($categories->take(5) as $category)
        @php $placeNumber++ @endphp
        <div class="category-container w-100">
            <h3>{{ $category->name['ru']}}</h3>
            <div class="swiper-category-container{{$placeNumber}}">
                <div class="swiper-wrapper">
                    @foreach($category->books as $book)
                        @if($book->is_active)
                            <div class="book-container swiper-slide">
                                <div>
                                    <img src="{{ asset('storage/' . $book->images->first()->url) }}" alt="" width="100%"
                                         height="244px">
                                    <div class="book-container-content">
                                        <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                        <p>{{ $book->title['ru'] }}</p>
                                    </div>
                                </div>
                                <button onclick="window.location.href='{{route('book-show', $book->id)}}'"> Читать книгу
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="swiper-category-button-prev{{$placeNumber}}"><img src="img/icons/left.svg" alt=""></div>
                <div class="swiper-category-button-next{{$placeNumber}}"><img src="img/icons/right.svg" alt=""></div>
            </div>
        </div>

        @if($placeNumber == 2)
            @if($collections->find(2))
                <div class="best-book-month d-flex justify-content-between w-100">
                    <div class="d-flex top-books flex-column justify-content-between align-items-start">
                        <button class="top-btn">
                            {{ $collections->find(2)->name['ru'] }}
                        </button>
                        <div>
                        <span
                            class="author">•  {{ $collections->find(2)->books->first()->author->name['ru'] }}</span><br>
                            <h2>
                                {{ $collections->find(2)->books->first()->title['ru'] }}
                            </h2>
                            <p class="top-book-desc">
                                {{ $collections->find(2)->books->first()->description['ru'] }}
                            </p>
                        </div>
                        <div>
                            <button class="top-read-book"
                                    onclick="window.location.href='{{route('book-show', $collections->find(2)->books->first()->id)}}'">
                                Читать книгу
                            </button>
                            <button class="top-readen">
                                Прочитана
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-start">
                        <img class="best-book"
                             src="{{ asset('storage/' . $collections->find(2)->books->first()->images->first()->url) }}"
                             alt=""
                             height="518px" width="349px">

                        <div class="best-book-month-info">
                            <div>
                                <span class='author'>Рейтинг</span>
                                <div><img src="/img/icons/star.svg" alt="">
                                    <b>4,9 </b>
                                </div>
                            </div>
                            <div>
                                <span class="author">Прочитана (раз)</span>
                                <div><img class="me-2" src="/img/icons/heart.svg" alt="">
                                    <b> 10,1 тыс</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-books-mobile">
                        <button class="top-btn">
                            {{ $collections->find(2)->name['ru'] }}
                        </button>
                    </div>
                </div>
            @endif
        @endif

        @if($placeNumber == 3)
            @if($collections->find(3))
                <div class="top-readen-book-container d-flex justify-content-between align-items-center w-100">
                    <div class="top-readen-book d-flex justify-content-between flex-column align-items-start">
                        <button>Cамые читаемые книги</button>
                        <p>{{ $collections->find(3)->name['ru'] }}</p>
                        <span>
                     {{ $collections->find(3)->description['ru']}}
                    </span>
                    </div>
                    <div class="category-container">
                        <div class="swiper-collection-container">
                            <div class="swiper-wrapper">
                                @foreach($collections->find(3)->books as $book)
                                    <div class="book-container swiper-slide">
                                        <div>
                                            <img src="{{asset('storage/'. $book->images->first()->url)}}"
                                                 alt="{{ $book->title['ru'] }}">
                                            <div class="book-container-content">
                                                <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                                <p>{{ $book->title['ru'] }}</p>
                                            </div>
                                        </div>
                                        <button onclick="window.location.href='{{route('book-show', $book->id)}}'">
                                            Читать
                                            книгу
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="swiper-collection-container-prev"><img src="img/icons/left.svg" alt=""></div>
                            <div class="swiper-collection-container-next"><img src="img/icons/right.svg" alt=""></div>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if($placeNumber == 4)
            @if($collections->find(4))
                <div class="new-books w-100">
                    <button>
                        {{ $collections->find(4)->name['ru'] }}
                    </button>
                    <p>
                        {{ $collections->find(4)->description['ru'] }}
                    </p>

                    <div class="new-books-slide swiper-new-book-container">
                        <div class="swiper-wrapper">
                            @php $books = $collections->find(4)->books; @endphp
                            @foreach($books->chunk(2) as $bookPair)
                                <div class="swiper-slide">
                                    @foreach($bookPair as $book)
                                        <div class="new-book-container"
                                             onclick="window.location.href='{{route('book-show', $book->id)}}'">
                                            <img src="{{asset('storage/'. $book->images->first()->url )}}" alt=""
                                                 width="161px"
                                                 height="100%">
                                            <div class="book-container-content">
                                                <h3>{{ $book->title['ru'] }}</h3>
                                                <p>{{ $book->description['ru'] }}</p>
                                                <span class="author">• {{ $book->author->name['ru'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-new-book-prev"><img src="img/icons/left.svg" alt=""></div>
                        <div class="swiper-new-book-next"><img src="img/icons/right.svg" alt=""></div>
                    </div>
                </div>

                <div class="top-news-mobile category-container d-flex flex-column w-100">
                    <div class="swiper-top-book-container">
                        <div class="swiper-wrapper">
                            @foreach( $collections->find(4)->books as $book)
                                <div class="book-container swiper-slide">
                                    <div>
                                        <img src="storage/{{$book->images->first()->url}}" alt="">
                                        <div class="book-container-content">
                                            <span class="author">• {{ $book->author->name['ru'] }}</span><br>
                                            <p>{{ $book->title['ru'] }}</p>
                                        </div>
                                    </div>
                                    <button onclick="window.location.href='{{route('book-show', $book->id)}}'"> Читать
                                        книгу
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="swiper-top-book-container-prev"><img src="img/icons/left.svg" alt=""></div>
                        <div class="swiper-top-book-container-next"><img src="img/icons/right.svg" alt=""></div>
                    </div>
                </div>
            @endif
        @endif
    @endforeach

    <div class="top-genre w-100">
        <p class="top-genre-p">Топ жанры</p>
        <div class="genre-grid">
            @foreach($topGenres as $top)
                <div class="genere-container"
                     onclick="window.location.href='{{ route('genre-books', $top->genre->id) }}'">
                    @if($top->genre->images->first())
                        <img src="storage/{{ $top->genre->images->first()->url }}" alt="">
                    @endif
                    <div class="genres-info">
                        <span class="author">• {{ $top->genre->name['ru'] }}</span><br>
                        <p>Книги в жанре<br>
                            <span>«{{ $top->genre->name['ru'] }}»</span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<footer>
    <div class="container d-flex justify-content-between">
        <img class="logo-white" src="img/logo-white.png" alt="" onclick="window.location.href='{{url('/')}}'">
        <div class="footer-content d-flex justify-content-between align-items-cente ">
            <ul class="d-flex align-items-center flex-row">
                <li>Правила <img src="/img/icons/chevron-right.svg"></li>
                <li>Оферта <img src="/img/icons/chevron-right.svg"></li>
                <li onclick="window.location.href='{{route('contacts')}}'">Контакты<img
                        src="/img/icons/chevron-right.svg"></li>
                <li>Связаться <img src="/img/icons/chevron-right.svg"></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    @if($collections->first())
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: {{ $collections->first()->books->count() *  2}},
        centeredSlides: true,
        spaceBetween: -3,
        initialSlide: {{ round($collections->first()->books->count() / 2) + 1}},
        effect: 'coverflow',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        coverflowEffect: {
            rotate: 50, // Поворот слайдов
            stretch: 0, // Растяжение слайдов
            depth: 100, // Глубина
            modifier: 1,
            slideShadows: true, // Тени на слайдах
        },
        speed: 500,
    });
    @endif

    @php $placeNumber = 0; @endphp
    @foreach($categories->take(5) as $category)
    @php $placeNumber++ @endphp
    new Swiper('.swiper-category-container{{$placeNumber}}', {
        loop: true,
        {{--slidesPerView: {{$category->books->count()}},--}}
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-category-button-next{{$placeNumber}}',
            prevEl: '.swiper-category-button-prev{{$placeNumber}}',
        },
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
        speed: 500,
    });
    @endforeach

    new Swiper('.swiper-new-book-container', {
        loop: true,
        slidesPerView: 2,
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-new-book-next',
            prevEl: '.swiper-new-book-prev',
        },
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
        speed: 500,
    });

    @if($collections->find(4))
    new Swiper('.swiper-top-book-container', {
        loop: true,
        {{--slidesPerView: {{$collections->find(4)->books->count()}},--}}
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-top-book-container-next',
            prevEl: '.swiper-top-book-container-prev',
        },
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
        speed: 500,
    });
    @endif


    @if($collections->find(3))
    new Swiper('.swiper-collection-container', {
        loop: true,
        {{--slidesPerView: {{$collections->find(3)->books->count()}},--}}
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-collection-container-next',
            prevEl: '.swiper-collection-container-prev',
        },
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
        speed: 500,
    });
    @endif

    $(document).ready(function () {
        $('.menu-icon').on('click', function () {
            $('.menu-mobile-active').addClass('active');
            $('body').addClass('no-scroll');
        });

        $('.close-menu').on('click', function () {
            $('.menu-mobile-active').removeClass('active');
            $('body').removeClass('no-scroll');
        });

        $('.search-icon-mobile').on('click', function () {
            $('.search-mobile').toggleClass('search-container-mobile');
        });


        $('.search').on('focus', function () {
            $('.search-icon').css('filter', 'invert(79%) sepia(78%) saturate(1862%) hue-rotate(330deg) brightness(106%) contrast(103%)');
            $('.cross-icon').css('display', 'block');
        });

        $('.search').on('blur', function () {
            setTimeout(function () {
                $('.search-icon').css('filter', 'invert(68%) sepia(0%) saturate(13%) hue-rotate(166deg) brightness(91%) contrast(89%)');
                $('.cross-icon').css('display', 'none');
            }, 100);

            $('.cross-icon').click(function () {
                $('.search').val('');
            });
        });

        document.querySelector('.custom-select').addEventListener('click', function () {
            document.querySelector('.custom-select-options').classList.toggle('show');
        });

        document.querySelectorAll('.custom-select-option').forEach(function (option) {
            option.addEventListener('click', function () {
                let selectedOption = option.textContent.trim();
                let selectedFlag = option.querySelector('img').src;
                let customSelect = option.closest('.custom-select');

                let selectedTextContainer = customSelect.querySelector('.custom-select-selected');

                selectedTextContainer.textContent = selectedOption;

                const existingFlag = selectedTextContainer.querySelector('.selected-flag');
                if (existingFlag) {
                    existingFlag.remove();
                }

                let flagImg = document.createElement('img');
                flagImg.src = selectedFlag;
                flagImg.alt = selectedOption;
                flagImg.classList.add('selected-flag');

                selectedTextContainer.insertBefore(flagImg, selectedTextContainer.firstChild);
            });
        });

        $('.top-read-book').hover(
            function () {
                $(this).text('Читать').delay(500);
            },
            function () {
                $(this).append(' книгу').delay(500);
            }
        );
    });
</script>
</body>
</html>
