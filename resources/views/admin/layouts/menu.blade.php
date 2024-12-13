<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <h5 style="margin: 0 !important;">
            <a href="{{ route('dashboard') }}" class="app-brand-link">
                Reading
            </a>
        </h5>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <ul class="menu-inner py-1 ps ps--active-y">
        {{--        <li class="menu-item {{ Request::is('dashboard/') ? 'active' : '' }}">--}}
        {{--            <a href="{{route('dashboard')}}" class="menu-link">--}}
        {{--                <i class="menu-icon tf-icons bx bx-home-circle"></i>--}}
        {{--                <div data-i18n="Панели управления">Панели управления</div>--}}
        {{--            </a>--}}
        {{--        </li>--}}

        <li class="menu-item {{ Request::is('dashboard/admins*') ? 'active' : '' }}">
            <a href="{{ route('admins.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shield"></i>
                <div data-i18n="Пользователи">Пользователи панели</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('dashboard/users') ? 'active' : '' }}">
            <a href="{{ route('users') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Пользователи сайта">Пользователи сайта</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('dashboard/books*') || Request::is('dashboard/categories*') || Request::is('dashboard/genres*') || Request::is('dashboard/tags*') || Request::is('dashboard/reviews*') || Request::is('dashboard/authors*') ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Книги">Книги</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dashboard/books*') ? 'active' : '' }}">
                    <a href="{{route('books.index')}}" class="menu-link">
                        <div data-i18n="Список">Список</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/authors*') ? 'active' : '' }}">
                    <a href="{{route('authors.index')}}" class="menu-link">
                        <div data-i18n="Авторы">Авторы</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                    <a href="{{route('categories.index')}}" class="menu-link">
                        <div data-i18n="Категории">Категории</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/genres*') ? 'active' : '' }}">
                    <a href="{{route('genres.index')}}" class="menu-link">
                        <div data-i18n="Жанры">Жанры</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/tags*') ? 'active' : '' }}">
                    <a href="{{route('tags.index')}}" class="menu-link">
                        <div data-i18n="Теги">Теги</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/reviews*') ? 'active' : '' }}">
                    <a href="{{route('reviews.index')}}" class="menu-link">
                        <div data-i18n="Отзывы">Отзывы</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('dashboard/collections*') ? 'active' : '' }}">
            <a href="{{ route('collections.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Пользователи">Коллекци</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('dashboard/promotions*') ? 'active' : '' }}">
            <a href="{{ route('promotions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-gift"></i>
                <div data-i18n="Пользователи">Акции</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('dashboard/news*') || Request::is('dashboard/news-categories*') ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Книги">Новости</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dashboard/news') || Request::is('dashboard/news/create') || Request::is('dashboard/news/update') ? 'active' : '' }}">
                    <a href="{{route('news.index')}}" class="menu-link">
                        <div data-i18n="Список">Список</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dashboard/news-categories*') ? 'active' : '' }}">
                    <a href="{{route('news-categories.index')}}" class="menu-link">
                        <div data-i18n="Категории">Категории</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

<div class="layout-overlay layout-menu-toggle"></div>
