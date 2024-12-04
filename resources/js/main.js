$(window).on('load', function () {
    $('#preloader').fadeOut(300, function () {
        $('main').fadeIn(300);
    });
});

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

    // Phone mask
    const phoneInput = $('.phone');

    phoneInput.on('focus', function () {
        if (!$(this).val().startsWith('+ 998')) {
            $(this).val('+ 998 ');
        }
    });

    phoneInput.mask('+ 998 (00) 000 00 00', {
        placeholder: '+ 998 (__) ___ __ __',
        clearIfNotMatch: true
    });

    phoneInput.on('blur', function () {
        if ($(this).val() === '+ 998 ') {
            $(this).val('');
        }
    });

    const inputs = $('.sms-code-input');

    inputs.on('input', function () {
        const $this = $(this);
        const value = $this.val();

        if (!/^\d$/.test(value)) {
            $this.val('');
            return;
        }

        const nextInput = $this.next('.sms-code-input');
        if (nextInput.length) {
            nextInput.focus();
        }
    });

    inputs.on('keydown', function (e) {
        const $this = $(this);
        if (e.key === 'Backspace' && !$this.val()) {
            const prevInput = $this.prev('.sms-code-input');
            if (prevInput.length) {
                prevInput.focus();
            }
        }
    });

    $('.login-link').on('click', function (event) {
        event.preventDefault();
        $('#auth-popup').css('display', 'flex');
    });

    $('.close-popup').on('click', function () {
        $('#auth-popup').css('display', 'none');
    });

    $('#register').on('click', function (event) {
        event.preventDefault();
        $('.register').css('display', 'block');
        $('.login').css('display', 'none');
    });

    $('#login').on('click', function (event) {
        event.preventDefault();
        $('.login').css('display', 'block');
        $('.register').css('display', 'none');
    });

    $(".star").on("click", function () {
        let rating = $(this).data("value");
        $("#ratting").val(rating);

        $(".star").removeClass("selected");
        $(this).addClass("selected");
        $(this).nextAll(".star").addClass("selected");
    });

    $("#hideAlert").on("click", function () {
        $('.review-alert').fadeOut(300);
    });

    $('#reviewText').on('input', function () {
        const maxLength = 600;
        const remaining = maxLength - $(this).val().length;
        $('#charCount').text(`Осталось символов: ${remaining}`);
    });

});
