<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <h5 style="margin: 0 !important;">
            <a href="{{ route('dashboard') }}" class="app-brand-link">
                Online reading
            </a>
        </h5>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <ul class="menu-inner py-1 ps ps--active-y">
        <li class="menu-item {{ Request::is('/') || Request::is('dashboard*') ? 'active' : '' }}">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Панели управления">Панели управления</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admins*') ? 'active' : '' }}">
            <a href="{{ route('admins.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shield"></i>
                <div data-i18n="Пользователи">Пользователи панели</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('users') ? 'active' : '' }}">
            <a href="{{ route('users') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Пользователи сайта">Пользователи сайта</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('books*') || Request::is('categories*') || Request::is('genres*') || Request::is('tags*') || Request::is('reviews*') ? 'open' : '' }}"
            style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Книги">Книги</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('books*') ? 'active' : '' }}">
                    <a href="{{route('books.index')}}" class="menu-link">
                        <div data-i18n="Список">Список</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('categories*') ? 'active' : '' }}">
                    <a href="{{route('categories.index')}}" class="menu-link">
                        <div data-i18n="Категории">Категории</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('genres*') ? 'active' : '' }}">
                    <a href="{{route('genres.index')}}" class="menu-link">
                        <div data-i18n="Жанры">Жанры</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('tags*') ? 'active' : '' }}">
                    <a href="{{route('tags.index')}}" class="menu-link">
                        <div data-i18n="Теги">Теги</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('reviews*') ? 'active' : '' }}">
                    <a href="{{route('reviews.index')}}" class="menu-link">
                        <div data-i18n="Отзывы">Отзывы</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Request::is('collections*') ? 'active' : '' }}">
            <a href="{{ route('collections.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Пользователи">Калекции</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('promotions*') ? 'active' : '' }}">
            <a href="{{ route('promotions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Пользователи">Акции</div>
            </a>
        </li>
    </ul>
</aside>

<div class="layout-overlay layout-menu-toggle"></div>
