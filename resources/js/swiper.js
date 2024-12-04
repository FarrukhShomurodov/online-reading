new Swiper('.swiper-new-book-container', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-new-book-next',
        prevEl: '.swiper-new-book-prev',
    },
    speed: 500,
});

new Swiper('.swiper-top-book-container', {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-top-book-container-next',
        prevEl: '.swiper-top-book-container-prev',
    },
    speed: 500,
});


// new Swiper('.swiper-collection-container', {
//     loop: true,
//     spaceBetween: 10,
//     navigation: {
//         nextEl: '.swiper-collection-container-next',
//         prevEl: '.swiper-collection-container-prev',
//     },
//     speed: 500,
// });

$('[class^="swiper-collection-container"]').each(function () {
    const $container = $(this);
    const $slides = $container.find('.swiper-slide');

    if ($slides.length === 0) {
        return;
    }

    new Swiper(this, {
        loop: $slides.length > 1,
        spaceBetween: 10,
        slidesPerView: 'auto',
        slidesPerGroup: 1,
        navigation: {
            nextEl: '.swiper-collection-container-next',
            prevEl: '.swiper-collection-container-prev',
        },
        speed: 500,
        breakpoints: {
            600: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: Math.min($slides.length, 5),
            },
            1024: {
                slidesPerView: Math.min($slides.length, 7),
            },
        },
    });
});


$(document).ready(function () {
    // Находим все элементы с классом, начинающимся на `swiper-category-container`
    $('[class^="swiper-category-container"]').each(function (index, container) {
        const $container = $(container); // Преобразуем в объект jQuery
        const $slides = $container.find('.swiper-slide'); // Находим слайды внутри контейнера

        if ($slides.length === 0) {
            console.warn(`No slides found in container ${index + 1}`);
            return; // Пропускаем контейнеры без слайдов
        }

        // Инициализация Swiper
        const swiper = new Swiper(container, {
            loop: $slides.length > 1, // Включить loop только если больше одного слайда
            spaceBetween: 10,
            slidesPerView: 'auto', // Подстраивается под ширину
            slidesPerGroup: 1, // По одному слайду за раз
            navigation: {
                nextEl: `.swiper-category-button-next${index + 1}`, // Привязка к уникальным кнопкам
                prevEl: `.swiper-category-button-prev${index + 1}`,
            },
            speed: 500,
            breakpoints: {
                600: {
                    slidesPerView: 1, // Один слайд на мобильных
                },
                768: {
                    slidesPerView: Math.min($slides.length, 5), // Не больше реального количества
                },
                1024: {
                    slidesPerView: Math.min($slides.length, 7),
                },
            },
        });

        console.log(`Swiper initialized for container ${index + 1}`, swiper);
    });
});

