import { activateFirstElement, setElementHeight } from "./functions";

let blogPageblog = document.querySelector("#blogs-overview");

if (blogPageblog) {
  // *********************************swiper slider
  const blogOverviewSlider = document.querySelector(".blog-page-slider");
  if (blogOverviewSlider) {
    const blogMainSlider = new Swiper(blogOverviewSlider, {
      slidesPerView: 1,
      spaceBetween: 0,
      speed: 1000,
      // mousewheel: true,
      mousewheel: {
        forceToAxis: false,
        sensitivity: 1,
        releaseOnEdges: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },

      // autoplay: {
      //   delay: 3000,
      //   disableOnInteraction: false,
      // },
    });
    blogMainSlider.on('reachEnd', function () {

      document.body.style.overflowY = 'scroll';
    });

  }

  // ************************************ tab blogs
  }


// ********************************* add class to humberger menu in single blog
const backBtn= document.querySelector('#back-btn');
if(backBtn){
  document.querySelector('.hamburger-menu').classList.add('single-blog');
}

// **************************************page load category for single blog page
let mobileCategoryList = document.querySelector('#mobile-category-list');
if(mobileCategoryList){
  let options = mobileCategoryList.querySelectorAll('option');

  for (let i = 0; i < options.length; i++) {
    mobileCategoryList.addEventListener('change',function (){
      window.location = this.value;
    });
  }
}
