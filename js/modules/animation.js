import { gsap } from "gsap";
import { pullUpAnimation, circleAnimation, imageAnimation } from "./functions";

pullUpAnimation();
circleAnimation();
imageAnimation();

// draw arrow
const arrowPath = document.getElementById("arrowPath");
const arrowHead = document.getElementById("arrowHead");
if (arrowPath && arrowHead) {
  const pathLength = arrowPath.getTotalLength();

  arrowPath.style.strokeDasharray = pathLength;
  arrowPath.style.strokeDashoffset = pathLength;

  arrowHead.style.strokeDasharray = pathLength;
  arrowHead.style.strokeDashoffset = pathLength;

  function startAnimation() {
    arrowPath.style.transition = "stroke-dashoffset 2s ease-in-out";
    arrowHead.style.transition = "stroke-dashoffset 2s ease-in-out";

    arrowPath.getBoundingClientRect();
    arrowPath.style.strokeDashoffset = "0";

    arrowHead.getBoundingClientRect();
    arrowHead.style.strokeDashoffset = "0";
  }

  window.addEventListener("load", startAnimation);
}

// ************************** empty  blog and search svg
const emptyBlogSvg = document.querySelector("#empty-blog-svg");
const employEmptyBlog = document.querySelector("#employ-empty-blog");
const questionMark1 = document.querySelector("#question-mark-1");
const questionMark2 = document.querySelector("#question-mark-2");

if (emptyBlogSvg) {
  gsap.from([emptyBlogSvg, employEmptyBlog, questionMark1, questionMark2], {
    scale: 0,
    duration: 1.5,
    delay: 0.5,
    y: "100px",
    x: "-100px",
    ease: "expo.inOut",
    stagger: 0.5,
  });
}
