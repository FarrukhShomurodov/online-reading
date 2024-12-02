const mix = require('laravel-mix');

mix.options({
    cache: true
});

mix.js('resources/js/main.js', 'public/site_js')
    .js('resources/js/swiper.js', 'public/site_js')
    .css('resources/css/auth.css', 'public/css')
    .css('resources/css/book-info.css', 'public/css')
    .css('resources/css/contacts.css', 'public/css')
    .css('resources/css/genres-book.css', 'public/css')
    .css('resources/css/header.css', 'public/css')
    .css('resources/css/main-content.css', 'public/css')
    .css('resources/css/room.css', 'public/css')
    .css('resources/css/style.css', 'public/css')
    .version();
