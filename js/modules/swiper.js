//
// import { Mousewheel,Navigation, Pagination, Scrollbar, A11y } from 'swiper/modules/' ;
// import { Swiper } from 'swiper';

const defaultSwiper = {
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
  defaultSwiper,
  direction: "vertical",
  mousewheel: true,
  speed: 1000,
});

const horizontalSliders = document.querySelectorAll(".home-nested-slider");

horizontalSliders.forEach((slider) => {
  const horizontalSwiper = new Swiper(slider, {
    defaultSwiper,
    speed: 1000,
    nested: true,
    mousewheel: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

// ********************************* about page main slider
export const swiperThumbnail = new Swiper(".about-thumbnail-slider", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  speed: 1000,
  watchSlidesProgress: true,
});
export const aboutMainSlider = new Swiper(".about-page-slider", {
  defaultSwiper,
  mousewheel: true,
  speed: 1000,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiperThumbnail,
  },
});

// ********************************* blog page swiper slider

export const blogMainSlider = new Swiper(".blog-page-slider", {
  defaultSwiper,
  speed: 1000,
  // mousewheel: true,
  mousewheel: {
    forceToAxis: false,
    sensitivity: 1,
    releaseOnEdges: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  // },
});
