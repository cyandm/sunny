import { toggleClassToBodyForSwiper } from "../modules/functions";
let blogPageBlog = document.querySelector("#blogs-overview");

if (blogPageBlog) {
  // ********************************* add class to humberger menu in single blog
  const backBtn = document.querySelector("#back-btn");
  if (backBtn) {
    document.querySelector(".hamburger-menu").classList.add("single-blog");
  }

  // ******************************** add class to header
  toggleClassToBodyForSwiper();
  document.body.addEventListener("mousewheel", () => {
    const header = document.querySelector("header");

    var scrollHeight = window.scrollY;

    if (scrollHeight >= window.innerHeight) {
      header.classList.add("header-white");
      document.body.classList.remove("first-slide");
    } else {
      header.classList.remove("header-white");
      document.body.classList.add("first-slide");
    }

    if (scrollHeight < window.innerHeight - 0.1 * window.innerHeight) {
      header.classList.remove("header-white");
    }
  });
}

// **************************************page load category for single blog page
let mobileCategoryList = document.querySelector("#cat-select-mobile");

if (mobileCategoryList) {
  mobileCategoryList.addEventListener("change", (e) => {
    window.location = e.target.value;
  });
}
