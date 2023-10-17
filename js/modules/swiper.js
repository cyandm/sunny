import {
  pullUpAnimation,
  circleAnimation,
  imageAnimation,
  initSwiper,
  toggleClassToBodyForSwiper,
} from "./functions";

import { Swiper } from "swiper";
import {
  Mousewheel,
  Navigation,
  Pagination,
  Scrollbar,
  Autoplay,
  Thumbs,
  Grid,
} from "swiper/modules";

const defaultSwiper = {
  modules: [
    Mousewheel,
    Navigation,
    Pagination,
    Scrollbar,
    Autoplay,
    Thumbs,
    Grid,
  ],
  slidesPerView: 1,
  spaceBetween: 0,
};

// ****************************** front page swiper slider
export const coachSlider = new Swiper(".coach-slider", {
  ...defaultSwiper,
  loop: true,
  speed: 1000,
  navigation: {
    nextEl: ".coach-slider-next",
    prevEl: ".coach-slider-prev",
  },
});

export const studentSlider = new Swiper(".students-slider", {
  ...defaultSwiper,
  slidesPerView: "auto",
  spaceBetween: 16,
  nested: true,
  loop: true,
});

export const studentSliderPopup = new Swiper(".students-slider-popup", {
  slidesPerView: "auto",
  spaceBetween: 20,
  loop: true,
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

//****************************** package slider */
const packageSliderElement = document.querySelector(".package-slider");
export const packageSlider = new Swiper(packageSliderElement, {
  slidesPerView: "auto",
  spaceBetween: 16,
  loop: true,
});

if (packageSliderElement && window.innerWidth >= 1400) {
  packageSlider.destroy();
}

//******************************* shop slider in mobile view
const shopSliderElement = document.querySelector(".shop-slider");
export const shopSlider = new Swiper(shopSliderElement, {
  slidesPerView: "auto",
  spaceBetween: 16,
  loop: true,
  // Responsive breakpoints
  breakpoints: {
    768: {
      ...defaultSwiper,
      slidesPerColumn: 2,
      grid: {
        rows: 2,
      },
    },
  },

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
});

if (shopSliderElement && window.innerWidth >= 1400) {
  shopSlider.destroy();
}

// ****************************** testimonial swiper slider
export const testimonialSlider = new Swiper(".testimonial-slider", {
  slidesPerView: "auto",
  spaceBetween: 16,
  loop: true,

  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
});

// ********************************* front page main slider
const homeMainSlider = document.querySelector(".home-main-slider");
export const frontMainSlider = new Swiper(homeMainSlider, {
  ...defaultSwiper,
  direction: "vertical",
  mousewheel: true,
  speed: 1000,
  navigation: {
    nextEl: ".home-main-slider-next",
    prevEl: ".home-main-slider-prev",
  },
});

if (homeMainSlider) {
  initSwiper(frontMainSlider);

  window.addEventListener("load", () => {
    toggleClassToBodyForSwiper();
  });

  const scrollTop = document.querySelector("#scroll-to-top");
  scrollTop.addEventListener("click", () => {
    frontMainSlider.slideTo(0);
    frontMainSlider.speed(3000);
  });
}

frontMainSlider.on("slideChange", () => {
  if (frontMainSlider.realIndex == 0) {
    document.querySelector("header").classList.remove("header-white");
  } else {
    document.body.classList.remove("first-slide");

    document.querySelector("header").classList.add("header-white");
  }
});

const horizontalSliders = document.querySelectorAll(".home-nested-slider");
horizontalSliders.forEach((slider, index) => {
  const horizontalSwiper = new Swiper(slider, {
    ...defaultSwiper,
    speed: 1000,
    nested: true,
    mousewheel: true,
    navigation: {
      nextEl: ".home-nested-next",
      prevEl: ".home-nested-prev",
    },
  });

  if (index == 0) {
    horizontalSwiper.on("slideChange", () => {
      if (horizontalSwiper.realIndex == 0) {
        if (!document.body.classList.contains("first-slide")) {
          document.body.classList.add("first-slide");
        }
      } else {
        document.body.classList.remove("first-slide");
      }
    });

    if (window.innerWidth <= 992) {
      horizontalSwiper.mousewheel.disable();
    }
  }
  if (index == 1) {
    initSwiper(horizontalSwiper);
    if (window.innerWidth >= 992) {
      horizontalSwiper.slides.forEach((startSlide) => {
        const startDescription = startSlide.querySelector(".start-description");

        startDescription.addEventListener("mouseenter", () => {
          horizontalSwiper.mousewheel.disable();
          frontMainSlider.mousewheel.disable();
        });

        startDescription.addEventListener("mouseleave", () => {
          horizontalSwiper.mousewheel.enable();
          frontMainSlider.mousewheel.enable();
        });

        const moreContent = startSlide.querySelector(".more-content");
        moreContent.addEventListener("click", () => {
          console.log(moreContent);
          moreContent.parentElement.classList.add("active");
        });
        const lessContent = startSlide.querySelector(".less-content");
        lessContent.addEventListener("click", () => {
          moreContent.parentElement.classList.remove("active");
        });
      });
    }
  }
});

// ********************************* about page main slider
const aboutThumbnailSlideElement = document.querySelector(
  ".about-thumbnail-slider"
);
export const aboutThumbnailSlider = new Swiper(aboutThumbnailSlideElement, {
  spaceBetween: 10,
  slidesPerView: "auto",
  freeMode: true,
});

const aboutMainSliderElement = document.querySelector(".about-page-slider");
export const aboutMainSlider = new Swiper(aboutMainSliderElement, {
  ...defaultSwiper,
  speed: 1000,
  thumbs: {
    swiper: aboutThumbnailSlider,
  },
});
if (aboutMainSliderElement) {
  initSwiper(aboutMainSlider);
}

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
    nextEl: ".blog-swiper-button-next",
    prevEl: ".blog-swiper-button-prev",
  },

  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  // },
});
if (blogMainSlider) {
  toggleClassToBodyForSwiper();
  blogMainSlider.on("slideChange", () => {
    if (blogMainSlider.realIndex == 0) {
      if (!document.body.classList.contains("first-slide")) {
        document.body.classList.add("first-slide");
      }
    } else {
      document.body.classList.remove("first-slide");
    }
  });
}

pullUpAnimation();
circleAnimation();
imageAnimation();
