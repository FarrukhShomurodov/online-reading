<footer>
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
</footer>
