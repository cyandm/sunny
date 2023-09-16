import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

let sectionContainer = document.querySelector("#panels-container2");
let sectionTween;
const sectionPanels = gsap.utils.toArray("#panels-container2 .panel2");

/* Main navigation */
let panelsContainer = document.querySelector("#panels-container");
let tween;
document.querySelectorAll(".anchor").forEach(anchor => {
    anchor.addEventListener("click", function(e) {
        e.preventDefault();
        let targetElem = document.querySelector(e.target.getAttribute("href")),
            y = targetElem;
        if (targetElem && panelsContainer.isSameNode(targetElem.parentElement)) {
            let totalScroll = tween.scrollTrigger.end - tween.scrollTrigger.start;
            let totalMovement = (panels.length - 1) * (window.innerWidth);
            y = Math.round(tween.scrollTrigger.start + (targetElem.offsetLeft / totalMovement) * totalScroll);
        }
        if (targetElem && sectionContainer.isSameNode(targetElem.parentElement)) {
            let totalScroll = sectionTween.scrollTrigger.end - sectionTween.scrollTrigger.start;
            let totalMovement = (sectionPanels.length - 1) * (window.innerWidth);
            y = Math.round(sectionTween.scrollTrigger.start + (targetElem.offsetLeft / totalMovement) * totalScroll);
        }
        gsap.to(window, {
            scrollTo: {
                y: y,
                autoKill: false
            },
            duration: 1
        });
    });
});

// *************************************** first section
const panels = gsap.utils.toArray("#panels-container .panel");
// console.log(-100 * (panels.length ));
tween = gsap.to(panels, {
    xPercent: -100 * (panels.length - 1),
    ease: "none",
    scrollTrigger: {
        trigger: "#panels-container",
        pin: true,
        start: "top top",
        scrub: 1,
        snap: {
            snapTo: 1 / (panels.length - 1),
            inertia: false,
            duration: { min: 0.1, max: 0.1 }
        },
        end: () => "+=" + (panelsContainer.offsetWidth - window.innerWidth)
    }
});

// ****************************************** second section
sectionTween = gsap.to(sectionPanels, {
    xPercent: -100 * (sectionPanels.length - 1),
    ease: "none",
    scrollTrigger: {
        trigger: "#panels-container2",
        pin: true,
        start: "top top",
        scrub: 1,
        snap: {
            snapTo: 1 / (sectionPanels.length - 1),
            inertia: false,
            duration: { min: 0.1, max: 0.1 }
        },
        end: () => "+=" + (sectionContainer.offsetWidth - window.innerWidth)
    }
});
























// const sections = document.querySelectorAll(".scroll-section");
//
// sections.forEach((section, index) => {
//     const circle = section.querySelector(".circle");
//     const text = section.querySelector(".text");
//     const image = section.querySelector(".image");
//
//     gsap.fromTo(
//         circle,
//         { opacity: 0, scale: 0.2 },
//         {
//             opacity: 1,
//             scale: 1,
//             scrollTrigger: {
//                 trigger: section,
//                 start: "top center",
//                 end: "bottom center",
//                 scrub: true,
//             },
//         }
//     );
//
//     gsap.fromTo(
//         text,
//         { opacity: 0, y: -20 },
//         {
//             opacity: 1,
//             y: 0,
//             scrollTrigger: {
//                 trigger: section,
//                 start: "top center",
//                 end: "bottom center",
//                 scrub: true,
//             },
//         }
//     );
//
//     gsap.fromTo(
//         image,
//         { opacity: 0, scale: 0.2 },
//         {
//             opacity: 1,
//             scale: 1,
//             scrollTrigger: {
//                 trigger: section,
//                 start: "top center",
//                 end: "bottom center",
//                 scrub: true,
//             },
//         }
//     );
// });
