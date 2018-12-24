if (document.querySelector('#peppermint') != null) {


    var slider = Peppermint(document.querySelector('#peppermint'), {
            slideshow: true,
            speed: 500,
            touchSpeed: 300,
            slideshowInterval: 3500,
            dots: false
        }),

        navLeft = document.querySelector('#peppermint-left'),
        navRight = document.querySelector('#peppermint-right');

    navRight.addEventListener('click', slider.next, false);
    navLeft.addEventListener('click', slider.prev, false);

}

if (document.querySelector('#news-slider') != null) {


    var slider = Peppermint(document.querySelector('#news-slider'), {
        slideshow: true,
        speed: 500,
        touchSpeed: 300,
        slideshowInterval: 3500,
        dots: true
    }),

    navLeft = document.querySelector('#slider__arrows-left'),
    navRight = document.querySelector('#slider__arrows-right');

    navRight.addEventListener('click', slider.next, false);
    navLeft.addEventListener('click', slider.prev, false);

}

