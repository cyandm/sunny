import Swiper from "swiper";

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
