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
    <img src="{{asset('/img/logo.png')}}" alt="logo" width="70px" height="27px"
         onclick="window.location.href='{{url('/')}}'">
    <div class="container d-flex justify-content-between align-items-center">
        <ul class="menu">
            <li class="menu-item" style="margin-left: 0 !important;"
                onclick="window.location.href='{{url('/')}}'">Главная
            </li>
            <li class="menu-item active" onclick="window.location.href='{{url('categories')}}'">Все категории</li>
            <li class="menu-item" onclick="window.location.href='{{url('genres')}}'">Все жанры</li>
            <li class="menu-item" onclick="window.location.href='{{url('collections')}}'">Подборки</li>
            <li class="menu-item" onclick="window.location.href='{{route('contacts')}}'">Контакты</li>
            <li class="menu-item">Оферта</li>
            <li class="menu-item">О нас</li>
        </ul>

        <div class="search-container">
            <img class="search-icon" src="{{asset('/img/icons/search.svg')}}" alt="search">
            <input class="search" type="text" placeholder="Книга, автор">
            <img class="cross-icon" src="{{asset('/img/icons/cross.svg')}}" alt="cross">
        </div>

        <div class="custom-select-container">
            <div class="custom-select">
                <div class="custom-select-selected">
                    <img src="{{asset('/img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option">
                        <img src="{{asset('/img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                    </div>
                    <div class="custom-select-option">
                        <img src="{{asset('/img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
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
        <img src="{{asset('/img/logo.png')}}" alt="logo" width="70px" height="27px"
             onclick="window.location.href='{{url('/')}}'">

        <div class="menu-mobile-nav">
            <img class="search-icon-mobile" src="{{asset('/img/icons/search.svg')}}" alt="">
            <div class="user-ava d-flex justify-content-center align-items-center"
                 onclick="window.location.href='/'"><span>F</span></div>
            <img class="menu-icon" src="{{asset('/img/icons/menu.svg')}}" alt="">
        </div>
    </div>
</header>

<div class="search-container search-mobile container">
    <img class="search-icon" src="{{asset('/img/icons/search.svg')}}" alt="search">
    <input class="search" type="text" placeholder="Книга, автор">
    <img class="cross-icon" src="{{asset('/img/icons/cross.svg')}}" alt="cross">
</div>

<!-- popuop menu -->
<div class="menu-mobile-active">
    <div class="d-flex justify-content-between align-items-cente w-100">
        <div class="custom-select">
            <div class="custom-select-selected">
                <img src="{{asset('/img/flag/ru.png')}}" alt="RU" class="selected-flag"> RU
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option">
                    <img src="{{asset('/img/flag/ru.png')}}" alt="RU" class="option-flag"> RU
                </div>
                <div class="custom-select-option">
                    <img src="{{asset('/img/flag/uz.png')}}" alt="UZ" class="option-flag"> Uz
                </div>
            </div>
        </div>
        <img src="{{asset('/img/menu-logo.png')}}" alt="logo" width="99px" height="38px">
        <img class="close-menu" src="{{ asset('/img/icons/cross.svg') }}" alt="" width="36px" height="36px">
    </div>
    <ul class="menu d-flex justify-content-center align-items-cente flex-column">
        <li class="menu-item" style="margin-left: 0 !important;"
            onclick="window.location.href='{{url('/')}}'">Главная
        </li>
        <li class="menu-item" onclick="window.location.href='{{url('categories')}}'">Все категории</li>
        <li class="menu-item" onclick="window.location.href='{{url('genres')}}'">Все жанры</li>
        <li class="menu-item" onclick="window.location.href='{{url('collections')}}'">Подборки</li>
        <li class="menu-item" onclick="window.location.href='{{route('contacts')}}'">Контакты</li>
        <li class="menu-item">Оферта</li>
        <li class="menu-item">О нас</li>
    </ul>

    <button>Мои книги</button>
</div>

<main class="container all-categories">
    @if(count($category->books) == 0)
        <div class="not-found">
            <p>Упс! Мы не нашли ни одной книги.</p>
            <button onclick="window.location.href='{{ url()->previous() }}'">Назад</button>
        </div>
    @else
        <h3 style="padding-left: 0">Книги в категории “{{ $category->name['ru'] }}”</h3>
        <div class="genre-grid all-genres">
            @foreach($category->books as $book)
                <div class="book-container">
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
            @endforeach
        </div>
    @endif
</main>

<footer>
    <div class="container d-flex justify-content-between">
        <img class="logo-white" src="/img/logo-white.png" alt=""
             onclick="window.location.href='{{url('/')}}'">
        <div class="footer-content d-flex justify-content-between align-items-cente ">
            <ul class="d-flex align-items-center flex-row container">
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
