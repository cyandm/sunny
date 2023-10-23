import { gsap } from "gsap";

// ************************************************ mobile menu
const mobile = document.querySelector(".hamburger-menu");

const close_mobile = document.getElementById("close-menu");

if (mobile) {
  (function () {
    mobile.addEventListener("click", function () {
      document.querySelector(".mobile-menu").classList.toggle("display-menu");
      document.querySelector("header").classList.toggle("custom-z-index");
      document.querySelector(".mobile-menu-detail").classList.toggle("active");
      document.body.style.overflow = "hidden";
      return false;
    });
    close_mobile.addEventListener("click", function () {
      document.querySelector(".mobile-menu-detail").classList.remove("active");
      document.querySelector(".mobile-menu").classList.remove("display-menu");
      document.querySelector("header").classList.remove("custom-z-index");
      document.body.style.overflow = "auto";
    });
  })();

  const menuItemsHasChildren = document.querySelectorAll(
    ".header-mobile li.menu-item-has-children"
  );

  menuItemsHasChildren.forEach((menuItem) => {
    menuItem.addEventListener("click", (e) => {
      e.stopPropagation();

      const subMenu = menuItem.querySelector("ul");
      if (menuItem.classList.contains("active-menu")) {
        menuItem.classList.remove("active-menu");
        subMenu.style.height = 0;
      } else {
        menuItem.classList.add("active-menu");
        subMenu.style.height = subMenu.scrollHeight + "px";
        const beforeHeight = subMenu.scrollHeight - 21 + "px";
        subMenu.style.setProperty("--mobile-before-height", beforeHeight);
        const subMenuLi = subMenu.querySelectorAll("li");
        const tl = gsap.timeline();

        subMenuLi.forEach((subMenu, index) => {
          tl.from(subMenu, {
            opacity: 0,
            duration: 0.3,
            delay: index * 0.2,
            y: -100,
          });
        });
      }
    });
  });
}

// *****************************mobile menu search box
const searchMenuMobile = document.querySelector(".form-search.menu-mobile");
searchMenuMobile.addEventListener("click", () => {
  searchMenuMobile.classList.remove("menu-mobile");
});

//********************** add class to hamburger-menu /
const backBtn = document.querySelector("#back-btn");
if (backBtn && window.innerWidth <= 992) {
  document.querySelector(".hamburger-menu").classList.toggle("with-back-btn");
}

// *********************** add class to header
