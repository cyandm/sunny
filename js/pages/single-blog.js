import {gsap} from "gsap";
import {ScrollTrigger} from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

const sections = document.querySelectorAll(".blog-special-progress-bar h2");
const progressBar = document.querySelector(".progress-bar");

if (progressBar && sections) {
    // Calculate progress steps based on the number of sections
    const progressStep = 100 / (sections.length - 1);

    // Create a function to update the progress bar height
    const updateProgressBar = () => {
        const scrollTop = window.scrollY;
        const windowHeight = window.innerHeight;
        const totalHeight = document.documentElement.scrollHeight;

        const scrollPercent = (scrollTop / (totalHeight - windowHeight)) * 100;
        const progressBarHeight =
            (scrollPercent / 100) * (sections.length - 1) * progressStep;
        progressBar.style.height = progressBarHeight + "%";
    };

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
            start: "top 50%",
            end: "bottom bottom",
            onEnter: () => (progressBar.style.height = "0%"),
            onLeave: () => (progressBar.style.height = "80%"),
        },
    });

    // Update the progress bar on scroll
    window.addEventListener("scroll", updateProgressBar);
    window.addEventListener("resize", updateProgressBar);


    //************************ remove blog image
    const singleAdvice = document.querySelector("#content-single >.single-advice");
    if (singleAdvice) {
        document.querySelector(".blog-img-single").style.display = "none";
    }

    // Scroll smoothly to the target section
    const accessBoxLink = document.querySelectorAll(".access-box a");
    accessBoxLink.forEach((link) => {

        link.querySelector(link.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
        });
    });

}





