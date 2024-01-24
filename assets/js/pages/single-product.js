import { Swiper } from 'swiper';
import { FreeMode, Thumbs } from 'swiper/modules';

const popupSubmitShoppingHandler = document.getElementById('submitShoppingBtn');
const popupSubmitShopping = document.getElementById('popupSubmitShopping');
const popupSubmitShoppingBGColor = document.querySelector(
  '#popupSubmitShopping .background-popup'
);
const btnClosePopupShopping = document.getElementById('btnClosePopupShopping');

if (popupSubmitShoppingHandler) {
  popupSubmitShoppingHandler.addEventListener('click', () => {
    if (!popupSubmitShoppingHandler.hasAttribute('disabled')) {
      if (popupSubmitShopping) {
        popupSubmitShopping.setAttribute('active', '');
      }
    }
  });
}

if (btnClosePopupShopping) {
  btnClosePopupShopping.addEventListener('click', () => {
    popupSubmitShopping.removeAttribute('active');
  });
}

if (popupSubmitShoppingBGColor) {
  popupSubmitShoppingBGColor.addEventListener('click', () => {
    popupSubmitShopping.removeAttribute('active');
  });
}

const swiperThumbnail = new Swiper('.swiper-thumbnail-image', {
  modules: [FreeMode],
  spaceBetween: 10,
  slidesPerView: 3,
  freeMode: true,
  watchSlidesProgress: true,
});

const swiperFeature = new Swiper('.swiper-feature-image', {
  modules: [Thumbs],
  loop: true,
  spaceBetween: 10,
  thumbs: {
    swiper: swiperThumbnail,
  },
});
