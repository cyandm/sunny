import {
  pullUpAnimation,
  circleAnimation,
  imageAnimation,
  initSwiper,
  toggleClassToBodyForSwiper,
} from './functions';

import { Swiper } from 'swiper';

import {
  Mousewheel,
  Navigation,
  Pagination,
  Scrollbar,
  Autoplay,
  Thumbs,
  Grid,
  EffectFade,
} from 'swiper/modules';

const defaultSwiper = {
  modules: [
    Mousewheel,
    Navigation,
    Pagination,
    Scrollbar,
    Autoplay,
    Thumbs,
    Grid,
    EffectFade,
  ],
  slidesPerView: 1,
  spaceBetween: 0,
};

// ****************************** front page swiper slider
export const coachSlider = new Swiper('.coach-slider', {
  ...defaultSwiper,
  // loop: true,
  spaceBetween: 16,
  speed: 500,
  autoHeight: true,
  fadeEffect: {
    crossFade: true,
  },
  effect: 'fade',

  navigation: {
    nextEl: '.coach-slider-prev',
    prevEl: '.coach-slider-next',
  },

  breakpoints: {
    1024: {
      autoHeight: false,
    },
  },
});

export const studentSlider = new Swiper('.students-slider', {
  ...defaultSwiper,
  slidesPerView: 'auto',
  spaceBetween: 16,
  nested: true,
  // loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    992: {
      slidesPerView: 3,
    },
  },
});

export const studentSliderPopup = new Swiper('.students-slider-popup', {
  ...defaultSwiper,
  slidesPerView: 1,
  spaceBetween: 20,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

//****************************** package slider */
const packageSliderElement = document.querySelector('.package-slider');
export const packageSlider = new Swiper(packageSliderElement, {
  ...defaultSwiper,
  slidesPerView: 1,
  spaceBetween: 16,
  //loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    880: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 'auto',
      width: 1440,
    },
  },
});

if (packageSliderElement && window.innerWidth >= 1400) {
  packageSlider.destroy();
}
// ****************************** testimonial swiper slider
export const testimonialSlider = new Swiper('.testimonial-slider', {
  slidesPerView: 'auto',
  spaceBetween: 16,

  autoplay: {
    delay: 3000,
  },
});

// ******************************* Home Page - Hero Slider
export const heroSlider = new Swiper('#heroSlider', {
  ...defaultSwiper,
  speed: 1500,
  autoplay: true,
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },

  navigation: {
    nextEl: '#heroSlider .home-nested-next',
    prevEl: '#heroSlider .home-nested-prev',
  },
});

const changeFirstSlideClass = (swiper) => {
  document.body.classList.toggle('first-slide', swiper.realIndex === 0);
};

heroSlider.on('slideChange', (swiper) => changeFirstSlideClass(swiper));

// ******************************* Home Page - AboutSlider

export const aboutSlider = new Swiper('#aboutSlider', {
  ...defaultSwiper,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  speed: 1000,

  navigation: {
    nextEl: '#aboutSlider .home-nested-next',
    prevEl: '#aboutSlider .home-nested-prev',
  },
});

// ********************************* blog page swiper slider
export const blogMainSlider = new Swiper('.blog-page-slider', {
  ...defaultSwiper,
  speed: 1000,
  navigation: {
    nextEl: '.blog-swiper-button-next',
    prevEl: '.blog-swiper-button-prev',
  },

  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  // },
});

blogMainSlider.on('slideChange', (swiper) => changeFirstSlideClass(swiper));

pullUpAnimation();
circleAnimation();
imageAnimation();

// ********************************* Video overview page swiper slider
export const videoOverviewSlider = new Swiper('.video-overview-slider', {
  slidesPerView: 'auto',
  speed: 1000,
  spaceBetween: 16,
  loop: true,
  centeredSlides: true,
});

// ********************************* About Sliders
export const aboutFeatureSlider = new Swiper('#aboutFeatureSlider', {
  ...defaultSwiper,

  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },

  navigation: {
    nextEl: '#aboutFeatureNavigation #Prev',
    prevEl: '#aboutFeatureNavigation #Next',
  },
});

export const aboutHistorySlider = new Swiper('#aboutHistorySlider', {
  ...defaultSwiper,

  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },

  navigation: {
    nextEl: '#aboutHistoryNavigation #Prev',
    prevEl: '#aboutHistoryNavigation #Next',
  },
});

export const aboutHonorSlider = new Swiper('#aboutHonorSlider', {
  slidesPerView: 1.25,
  spaceBetween: 20,
  centeredSlides: true,

  breakpoints: {
    1024: {
      slidesPerView: 2.25,
    },
  },
});
