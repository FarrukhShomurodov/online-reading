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


new Swiper('.swiper-collection-container', {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-collection-container-next',
        prevEl: '.swiper-collection-container-prev',
    },
    speed: 500,
});

for (let i = 0; i <= 5; i++) {
    new Swiper('.swiper-category-container' + i, {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-category-button-next' + i,
            prevEl: '.swiper-category-button-prev' + i,
        },
        speed: 500,
    });
}
