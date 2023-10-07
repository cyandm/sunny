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

// const leaves = document.querySelectorAll("#not-fond-animation svg path");
// console.log(leaves);
//
// leaves.forEach((leaf, index) => {
//     gsap.to(leaf, {
//         duration: Math.random() * 2 + 1,
//         y: '100px',
//         rotation: '360',
//         ease: 'power4.out',
//         repeat: -1,
//         repeatDelay: Math.random() * 2,
//         delay: Math.random() * 3,
//
//     });
// });
