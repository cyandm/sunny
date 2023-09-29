//
// import { Mousewheel,Navigation, Pagination, Scrollbar, A11y } from 'swiper/modules/' ;
// import { Swiper } from 'swiper';

const coachSlider = document.querySelector(".coach-slider");

if (coachSlider) {
  const swiper = new Swiper(coachSlider, {
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
}

// ****************************** testimonial swiper slider
const testimonialSlider = document.querySelector(".testimonial-slider");

if (testimonialSlider) {
  const swiper = new Swiper(testimonialSlider, {
    slidesPerView: 3.2,
    spaceBetween: 16,
    loop: true,

    //   autoplay: {
    //     delay: 3000,
    //     disableOnInteraction: false,
    //   },
  });
}

// ********************************* front page main slider
const mainSlider = new Swiper(".home-main-slider", {
  direction: "vertical",
  slidesPerView: 1,
  spaceBetween: 0,
  mousewheel: true,
  speed: 1000,
});

const horizontalSliders = document.querySelectorAll(".home-nested-slider");

horizontalSliders.forEach((slider) => {
  const horizontalSwiper = new Swiper(slider, {
    slidesPerView: 1,
    spaceBetween: 0,
    speed: 1000,
    nested: true,
    mousewheel: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
});
