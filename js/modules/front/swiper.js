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
