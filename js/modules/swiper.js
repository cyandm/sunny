import {pullUpAnimation, circleAnimation, imageAnimation, initSwiper} from "./functions";

import {Swiper} from "swiper";
import {
    Mousewheel,
    Navigation,
    Pagination,
    Scrollbar,
    Autoplay,
    Thumbs,
} from "swiper/modules";

const defaultSwiper = {
    modules: [Mousewheel, Navigation, Pagination, Scrollbar, Autoplay, Thumbs],
    slidesPerView: 1,
    spaceBetween: 0,
};

// ****************************** front page swiper slider
export const coachSlider = new Swiper(".coach-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    //   autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    //   },
});

// ****************************** testimonial swiper slider
export const testimonialSlider = new Swiper(".testimonial-slider", {
    slidesPerView: 3.2,
    spaceBetween: 16,
    loop: true,

    //   autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    //   },
});

// ********************************* front page main slider
export const frontMainSlider = new Swiper(".home-main-slider", {
    ...defaultSwiper,
    direction: "vertical",
    mousewheel: true,
    speed: 1000,
});

initSwiper(frontMainSlider);

const horizontalSliders = document.querySelectorAll(".home-nested-slider");

horizontalSliders.forEach((slider, index) => {

    const horizontalSwiper = new Swiper(slider, {
        ...defaultSwiper,
        speed: 1000,
        nested: true,
        mousewheel: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            992: {
                mousewheel: false,
                slidesPerView: 1,
            },
        }

    });
    if (index == 1) {
        initSwiper(horizontalSwiper);

    }
});

// ********************************* about page main slider
export const aboutThumbnailSlider = new Swiper(".about-thumbnail-slider", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
});

export const aboutMainSlider = new Swiper(".about-page-slider", {
    ...defaultSwiper,
    speed: 1000,
    thumbs: {
        swiper: aboutThumbnailSlider,
    },
});

const aboutNestedSlider = document.querySelectorAll(".about-nested-slider");

aboutNestedSlider.forEach((aboutSlider) => {
    const aboutHorizontalSwiper = new Swiper(aboutSlider, {
        ...defaultSwiper,
        speed: 1000,
        nested: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
});

// ********************************* blog page swiper slider

export const blogMainSlider = new Swiper(".blog-page-slider", {
    ...defaultSwiper,
    speed: 1000,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    // autoplay: {
    //   delay: 3000,
    //   disableOnInteraction: false,
    // },
    on: {
        slideChange: () => {
            pullUpAnimation();
            circleAnimation();
            imageAnimation();
        }
    }
});
