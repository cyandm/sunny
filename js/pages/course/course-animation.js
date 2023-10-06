import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const coursePageAnimation = document.querySelector("#course-page");
if (coursePageAnimation) {
  gsap.registerPlugin(ScrollTrigger);

  gsap.from(".bg-top-radius", {
    duration: 1.7,

    y: "-700",
    top: "-100%",
    ease: "expo.inOut",
    overflow: "hidden",
  });

  gsap.from(".image-animate img", {
    duration: 2,
    opacity: 0,
    y: "700",
    ease: "expo.inOut",
  });

  gsap.from(".img-title-animation", {
    duration: 1.5,
    delay: 1,
    opacity: 0,
    y: 30,
    ease: "expo.inOut",
    stagger: 0.5,
  });





  const courseBlocks = document.querySelectorAll(".course-block");
  courseBlocks.forEach((block, index) => {
    gsap.from(block, {
      opacity: 0,
      ease: "expo.inOut",
      duration: 1,
      scrollTrigger: {
        trigger: block,
        start: "top top+=70%",
        end: "bottom bottom",
        scrub: true,
        delay: 0.5 * index,
      },
    });

    const courseImg = block.querySelector(".course-img img");
    gsap.from(courseImg, {
      scale: 0,
      ease: "expo.inOut",
      duration: 1.5,
      scrollTrigger: {
        markers: true,
        trigger: block,
        start: " top  top+=50%",
        end: "bottom bottom",
        scrub: true,
      },
    });
  });
}


