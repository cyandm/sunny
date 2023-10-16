import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

import { toggleClass } from "../modules/functions";
// gsap.registerPlugin(ScrollTrigger);

let blogPageBlog = document.querySelector("#blogs-overview");

if (blogPageBlog) {
  // ********************************* add class to humberger menu in single blog
  const backBtn = document.querySelector("#back-btn");
  if (backBtn) {
    document.querySelector(".hamburger-menu").classList.add("single-blog");
  }

  // ******************************** add class to header
}

// **************************************page load category for single blog page
let mobileCategoryList = document.querySelector(".mobile-category-list");

if (mobileCategoryList) {
  for (let i = 0; i < mobileCategoryList.length; i++) {
    mobileCategoryList.addEventListener("change", () => {
      window.location = mobileCategoryList[i].value;
    });
  }
}
