let swiper = new Swiper(".swiper", {
    slidesPerView: 3,
    spaceBetween: 1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            spaceBetween: 2,
        },
        // when window width is >= 480px
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // when window width is >= 640px
        820: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
    },
});
