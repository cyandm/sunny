// ********************************* about page main slider
const swiperThumbnail = new Swiper(".about-thumbnail-slider", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    speed: 1000,
    watchSlidesProgress: true,
});
const mainSlider = new Swiper(".about-page-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    mousewheel: true,
    speed: 1000,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    thumbs: {
        swiper: swiperThumbnail,
    },
});