<footer class="d-flex flex-column">
    <div class="container d-flex justify-content-between">
        <img class="logo-white" src="{{asset('img/logo-white.png')}}" alt=""
             onclick="window.location.href='{{url('/')}}'">
        <div class="footer-content d-flex justify-content-between">
            <ul class="d-flex align-items-center flex-row">
                <li><a>Правила <img src="{{asset('img/icons/chevron-right.svg')}}" alt="chevron-right"></a></li>
                <li><a href="{{route('offer')}}"> Оферта <img src="{{asset('img/icons/chevron-right.svg')}}"
                                                              alt="chevron-right"></a></li>
                <li><a href="{{route('contacts')}}">Контакты<img src="{{asset('img/icons/chevron-right.svg')}}"
                                                                 alt="chevron-right"></a></li>
                <li><a href="{{route('about-us')}}"> Связаться <img src="{{asset('img/icons/chevron-right.svg')}}"
                                                                    alt="chevron-right">
                    </a></li>
            </ul>
        </div>
    </div>
    <hr class="full-width">
    <p class="container" style="font-size: 9px; color: white; padding: 0px !important;">
        Администрация сайта в обязательном порядке удаляет всю информацию, нарушающую авторские права, по
        первому требованию правообладателей. Просто свяжитесь с нами по электронной почте <span style="color: #FFB539">info@ultr.uz</span>,
        и мы
        окажем вам полное содействие. Все обращения обрабатываются максимум в течение 24 часов.
        Убедительная просьба: при обращении указывайте, пожалуйста, ссылку на ваш материал.
    </p>
</footer>
