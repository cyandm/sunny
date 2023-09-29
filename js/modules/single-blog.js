import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const sections = document.querySelectorAll(".blog-special-progress-bar h2");
const progressBar = document.querySelector(".progress-bar");

// Calculate progress steps based on the number of sections
const progressStep = 100 / (sections.length - 1);

// Create a function to update the progress bar height
function updateProgressBar() {
    const scrollTop = window.scrollY;
    const windowHeight = window.innerHeight;
    const totalHeight = document.documentElement.scrollHeight;

    const scrollPercent = (scrollTop / (totalHeight - windowHeight)) * 100;
    const progressBarHeight = (scrollPercent / 100) * (sections.length - 1) * progressStep;
    progressBar.style.height = progressBarHeight + "%";
}

// Iterate through sections and create ScrollTrigger instances
sections.forEach((section, index) => {
    const markerID = `marker-${index}`;

    // Create a ScrollTrigger for each section using the marker
    ScrollTrigger.create({
        trigger: section,
        start: "top 50%",
        end: "bottom 50%",
        onEnter: () => {
            section.classList.add("custom-style-h2");
        },
        onLeaveBack: () => {
            section.classList.remove("custom-style-h2");
        },
    });
});

gsap.to(progressBar, {
    height: "100%",
    scrollTrigger: {
        start: "top top",
        end: "bottom bottom",
        onEnter: () => progressBar.style.height = "0%",
        onLeave: () => progressBar.style.height = "100%",
    },
});

// Update the progress bar on scroll
window.addEventListener("scroll", updateProgressBar);
window.addEventListener("resize", updateProgressBar);
