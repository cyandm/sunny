import { gsap } from "gsap";

// ******************************404 page svg animation
const leaves = document.querySelectorAll("#not-fond-animation svg #Plants > g");

leaves.forEach((leaf, index) => {
  gsap.to(leaf, {
    duration: Math.random() * 2 + 1,
    x: "100px",
    rotation: "200",
    y: "200px",
    ease: "elastic.out(1,1)",
    repeat: -1,
    repeatDelay: Math.random() * 2,
    delay: Math.random() * 3,
  });
});
const svgNotFound = document.querySelectorAll("#not-fond-animation svg");
const womanSvg = document.querySelector("#woman-svg");
const SpeechBubble = document.querySelector("#Speech_Bubble");
gsap.from([svgNotFound, womanSvg, SpeechBubble], {
  scale: 0,
  duration: 1.5,
  delay: 0.5,
  y: "200px",
  x: "100px",
  ease: "expo.inOut",
  stagger: 0.5,
});

// ***************************** contact animation
const contactLineSvg = document.querySelector("#XMLID_3_");
const contactSvg = document.querySelector("#contact-svg");
const leaf1 = document.querySelector("#leaf-1");
const leaf2 = document.querySelector("#leaf-2");
const leaf3 = document.querySelector("#leaf-3");
const gearWheel = document.querySelector("#gear-wheel");
const Employee = document.querySelector("#XMLID_4_");
const circleContact1 = document.querySelector("#XMLID_25_");
const circleContact2 = document.querySelector("#XMLID_159_");
const circleContact3 = document.querySelector("#XMLID_29_");
const circleContact4 = document.querySelector("#XMLID_34_");
gsap.from(
  [
    contactSvg,
    leaf1,
    leaf2,
    leaf3,
    gearWheel,
    Employee,
    circleContact1,
    circleContact2,
    circleContact3,
    circleContact4,
  ],
  {
    scale: 0,
    duration: 1.5,
    delay: 0.5,
    y: "100px",
    // x: "100px",
    ease: "expo.inOut",
    stagger: 0.5,
  }
);

const contactTl = gsap.timeline();
contactTl.from(contactLineSvg, { opacity: 0, y: 200 });
