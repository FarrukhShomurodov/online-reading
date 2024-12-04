<footer class="d-flex flex-column">
    <div class="container d-flex justify-content-between">
        <img class="logo-white" src="{{asset('img/logo-white.png')}}" alt=""
             onclick="window.location.href='{{url('/')}}'">
        <div class="footer-content d-flex justify-content-between">
            <ul class="d-flex align-items-center flex-row">
                <li><a>@lang('site.rules') <img src="{{asset('img/icons/chevron-right.svg')}}" alt="chevron-right"></a>
                </li>
                <li><a href="{{route('offer')}}"> @lang('site.offer') <img
                            src="{{asset('img/icons/chevron-right.svg')}}"
                            alt="chevron-right"></a></li>
                <li><a href="{{route('contacts')}}">@lang('site.contacts')<img
                            src="{{asset('img/icons/chevron-right.svg')}}"
                            alt="chevron-right"></a></li>
                <li><a href="{{route('about-us')}}"> @lang('site.connect') <img
                            src="{{asset('img/icons/chevron-right.svg')}}"
                            alt="chevron-right">
                    </a></li>
            </ul>
        </div>
    </div>
    <hr class="full-width">
    <p class="container" style="font-size: 9px; color: white; padding: 0px !important;">
        {!! __('site.copyright_notice') !!}
    </p>
</footer>
