import { gsap } from "gsap";
import { frontMainSlider } from "./swiper";

export const pullUpAnimation = () => {
  gsap.from(".translate-animation > * ", {
    duration: 1,
    delay: 1.5,
    // transform: "translateY(0)",
    y: 200,
    ease: "power3.inOut",
    stagger: 0.5,
  });
};

export const circleAnimation = () => {
  gsap.from(".circle-animation", {
    duration: 1,
    delay: 2.2,
    scale: 0,
    ease: "expo.inOut",
  });
};
export const imageAnimation = () => {
  gsap.from(".image-animate img", {
    duration: 1,
    delay: 2.5,
    opacity: 0,
    y: "700",
    ease: "expo.inOut",
  });
};
export const multiCircleAnimate = (circle) => {
  gsap.from(circle, {
    scale: 0,
    duration: 1,
    delay: 0.5,
    ease: "expo.inOut",
    stagger: 0.5,
  });
};

export const addActiveClassLoop = (target, objectName) => {
  target.classList.add("active");
  objectName.forEach((item) => {
    if (item != target) {
      item.classList.remove("active");
    }
  });
};

export const toggleClass = (ifContent, target) => {
  target.classList.toggle("active", ifContent);
};

// Function to set the height of an element based on its content
export const setElementHeight = (element) => {
  element.parentElement.style.height = element.clientHeight + "px";
};

// Function to add the "active" class to the first element in a list
export const activateFirstElement = (elements) => {
  if (elements.length > 0) {
    elements[0].classList.add("active");

    elements.forEach((element) => {
      element.addEventListener("mouseover", () => {
        if (!element.classList.contains("active")) {
          elements.forEach((el) => {
            el.classList.remove("active");
          });
          element.classList.add("active");
        }
      });
    });
  }
};

export const initSwiper = (slider) => {
  if (window.innerWidth <= 992) {
    slider.destroy();
    window.addEventListener("resize", slider.destroy());
  }
};

export const drawSvg = (arrowPath, arrowHead) => {
  arrowPath.style.transition = "stroke-dashoffset 2s ease-in-out";
  arrowHead.style.transition = "stroke-dashoffset 4s ease-in-out";

  arrowPath.getBoundingClientRect();
  arrowPath.style.strokeDashoffset = "0";

  arrowHead.getBoundingClientRect();
  arrowHead.style.strokeDashoffset = "0";
};

export const toggleClassToBodyForSwiper = () => {
  const firstSlide = document.querySelector("#first-slide");
  if (firstSlide && firstSlide.classList.contains("swiper-slide-active")) {
    document.body.classList.toggle("first-slide");
  }
};

export const mousewheelBehavier = (slider) => {
  if (window.innerWidth <= 992) {
    slider.mousewheel.disable();
    window.addEventListener("resize", slider.mousewheel.disable());
  }
};
