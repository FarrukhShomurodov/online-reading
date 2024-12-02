<header class="desktop justify-content-between align-items-center">
    <img class="pointer-event" src="<?php echo e(asset('img/logo.png')); ?>" alt="logo" width="70px" height="27px"
         onclick="window.location.href='<?php echo e(url('/')); ?>'">
    <div class="container d-flex justify-content-between align-items-center">
        <ul class="menu">
            <li class="menu-item <?php if(Request::is('/')): ?> active <?php endif; ?>" style="margin-left: 0 !important;"><a
                    href="<?php echo e(url('/')); ?>">Главная</a></li>
            <li class="menu-item <?php if(Request::is('categories') || Request::is('category-books*')): ?> active <?php endif; ?>"><a
                    href="<?php echo e(route('categories')); ?>">Все
                    категории</a></li>
            <li class="menu-item <?php if(Request::is('genres') || Request::is('genre-books*')): ?> active <?php endif; ?>"><a
                    href="<?php echo e(route('genres')); ?>">Все жанры</a>
            </li>
            <li class="menu-item <?php if(Request::is('collections') || Request::is('collection-books*')): ?> active <?php endif; ?>"><a
                    href="<?php echo e(route('collections')); ?>">
                    Подборки</a></li>
            <li class="menu-item <?php if(Request::is('contacts')): ?> active <?php endif; ?>"><a href="<?php echo e(route('contacts')); ?>">
                    Контакты </a></li>
            <li class="menu-item <?php if(Request::is('offer') || Request::is('news*') || Request::is('promotion*')): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('offer')); ?>">Оферта</a></li>
            <li class="menu-item <?php if(Request::is('about-us')): ?> active <?php endif; ?>"><a href="<?php echo e(route('about-us')); ?>">О нас</a>
            </li>
        </ul>

        <div class="search-container">
            <form action="<?php echo e(route('search')); ?>" method="GET">
                <img class="search-icon" src="<?php echo e(asset('img/icons/search.svg')); ?>" alt="search">
                <input class="search" name="query" type="text" placeholder="Книга, автор"
                       value="<?php echo e(request('query')); ?>">
                <img class="cross-icon" src="<?php echo e(asset('img/icons/cross.svg')); ?>" alt="search">
            </form>
        </div>

        <div class="custom-select-container">
            <div class="custom-select">
                <div class="custom-select-selected">
                    <img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="RU" class="selected-flag"> RU
                </div>
                <div class="custom-select-options">
                    <div class="custom-select-option">
                        <img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="RU" class="option-flag"> RU
                    </div>
                    <div class="custom-select-option">
                        <img src="<?php echo e(asset('img/flag/uz.png')); ?>" alt="UZ" class="option-flag"> Uz
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="custom-select-container">
        <div class="custom-select">
            <div class="custom-select-selected user-ava d-flex justify-content-center align-items-center">
                F
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option">
                    <a href="<?php echo e(route('room')); ?>">Кабинет</a>
                </div>
                <div class="custom-select-option">
                    <?php if(auth()->guard('user')->user()): ?>
                        <a href="<?php echo e(route('user.logout')); ?>">Выход</a>
                    <?php else: ?>
                        <a id="login-link">Вход</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="mobile-device align-items-center">
    <div class="container d-flex justify-content-between flex-row align-items-center w-100">
        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="logo" width="70px" height="27px"
             onclick="window.location.href='<?php echo e(url('/')); ?>'">

        <div class="menu-mobile-nav">
            <img class="search-icon-mobile" src="<?php echo e(asset('img/icons/search.svg')); ?>" alt="">
            <div class="user-ava d-flex justify-content-center align-items-center"
                 onclick="window.location.href='/room'"><span>F</span></div>
            <img class="menu-icon" src="<?php echo e(asset('img/icons/menu.svg')); ?>" alt="">
        </div>
    </div>
</header>

<div class="search-container search-mobile">
    <form action="<?php echo e(route('search')); ?>" method="GET">
        <img class="search-icon" src="<?php echo e(asset('img/icons/search.svg')); ?>" alt="search">
        <input class="search" name="query" type="text" placeholder="Книга, автор"
               value="<?php echo e(request('query')); ?>">
        <img class="cross-icon" src="<?php echo e(asset('img/icons/cross.svg')); ?>" alt="search">
    </form>
</div>


<!-- popup menu -->
<div class="menu-mobile-active">
    <div class="d-flex justify-content-between align-items-cente w-100">
        <div class="custom-select">
            <div class="custom-select-selected">
                <img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="RU" class="selected-flag"> RU
            </div>
            <div class="custom-select-options">
                <div class="custom-select-option">
                    <img src="<?php echo e(asset('img/flag/ru.png')); ?>" alt="RU" class="option-flag"> RU
                </div>
                <div class="custom-select-option">
                    <img src="<?php echo e(asset('img/flag/uz.png')); ?>" alt="UZ" class="option-flag"> Uz
                </div>
            </div>
        </div>
        <img src="<?php echo e(asset('img/menu-logo.png')); ?>" alt="logo" width="99px" height="38px">
        <img class="close-menu" src="<?php echo e(asset('img/icons/cross.svg')); ?>" alt="" width="36px" height="36px">
    </div>
    <ul class="menu d-flex justify-content-center flex-column">
        <li class="menu-item active"><a href="<?php echo e(url('/')); ?>">Главная</a></li>
        <li class="menu-item"><a href="<?php echo e(route('categories')); ?>">Все категории</a></li>
        <li class="menu-item"><a href="<?php echo e(route('genres')); ?>">Все жанры</a></li>
        <li class="menu-item"><a href="<?php echo e(route('collections')); ?>"> Подборки</a></li>
        <li class="menu-item"><a href="<?php echo e(route('contacts')); ?>"> Контакты </a></li>
        <li class="menu-item"><a href="<?php echo e(route('offer')); ?>">Оферта</a></li>
        <li class="menu-item"><a href="<?php echo e(route('about-us')); ?>">О нас</a></li>
    </ul>

    <button>Мои книги</button>
</div>


<div class="auth-section" id="auth-popup">
    <div class="auth-container register">
        <button class="close-btn close-popup">×</button>

        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>Авторизация</h2>
                <span style="color: rgba(72, 72, 72, 1)">Введите ваш номер и придумайте пароль</span>
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="<?php echo e(route('user.register')); ?>" method="post" class="d-flex flex-column gap-4" id="auth-form">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">Номер телефона <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="sms-code">Код из смс <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <div class="d-flex gap-2">
                            <input name="sms_code[1]" type="number" maxlength="1" class="sms-code-input" id="sms-code-1"
                                   required>
                            <input name="sms_code[2]" type="number" maxlength="1" class="sms-code-input" id="sms-code-2"
                                   required>
                            <input name="sms_code[3]" type="number" maxlength="1" class="sms-code-input" id="sms-code-3"
                                   required>
                            <input name="sms_code[4]" type="number" maxlength="1" class="sms-code-input" id="sms-code-4"
                                   required>
                            <input name="sms_code[5]" type="number" maxlength="1" class="sms-code-input" id="sms-code-5"
                                   required>
                            <input name="sms_code[6]" type="number" maxlength="1" class="sms-code-input" id="sms-code-6"
                                   required>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="password">Пароль <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="Придумайте пароль" id="password" required>
                    </div>
                    <button type="submit">Получить код</button>
                </form>
            </div>
            <div class="auth-footer">
                <span>У вас уже есть аккаунт?</span> <a id="login"><u>Войти</u></a>
            </div>
        </div>
    </div>


    <div class="auth-container login">
        <button class="close-btn close-popup">×</button>

        <div class="d-flex justify-content-between align-items-center flex-column h-100">
            <div class="text-center">
                <h2>Вход в аккаунт</h2>
                <span style="color: rgba(72, 72, 72, 1)">Введите ваш номер и пароль</span>
            </div>
            <div class="auth-form-section w-100 h-100">
                <form action="<?php echo e(route('user.login')); ?>" method="post" class="d-flex flex-column gap-4" id="auth-form">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="phone">Номер телефона <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="text" name="phone_number" placeholder="+ 998 (XX) XXX XX XX" class="phone"
                               required>
                    </div>
                    <div class="d-flex flex-column align-items-start w-100">
                        <label for="password">Пароль <span style="color: rgba(239, 79, 79, 1)">*</span></label>
                        <input type="password" name="password" placeholder="Введите пароль" id="password" required>
                    </div>
                    <button type="submit">Подтвердить</button>
                </form>
            </div>
            <div class="auth-footer">
                <span>У вас уже есть аккаунт?</span> <a id="register"><u>Авторизация</u></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\OSPanel\domains\onile-reading\resources\views/site/layouts/header.blade.php ENDPATH**/ ?>