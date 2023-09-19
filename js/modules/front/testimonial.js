import { addActiveClassLoop, addClass } from "../functions";

// ********************************* tab click on testimonial
const testimonial = document.querySelectorAll(".person-img");

if (testimonial) {
  // first video play
  const firstVideo = document.querySelector(".video-content.active");
  const firstPlay = firstVideo.querySelector("i");

  firstPlay.addEventListener("click", () => {
    firstVideo.querySelector("img").remove();
    firstPlay.remove();
    firstVideo.querySelector("video").play();
  });

  testimonial.forEach((person) => {
    person.addEventListener("click", () => {
      // add class to element

      addActiveClassLoop(person, testimonial);

      // add class to video section
      const videoContainer = document.querySelectorAll(".video-content");

      videoContainer.forEach((video) => {
        const ifContent =
          video.getAttribute("data-id") == person.getAttribute("data-id");

        addClass(ifContent, video);

        // play video
        if (video.classList.contains("active")) {
          const play = video.querySelector("i");
          play.addEventListener("click", () => {
            video.querySelector("img").remove();
            play.remove();
            video.querySelector("video").play();
          });
        }
      });

      // add class in testimonial info section
      const personInfo = document.querySelectorAll(".person_info");

      personInfo.forEach((info) => {
        const contentIf =
          info.getAttribute("data-id") == person.getAttribute("data-id");
        addClass(contentIf, info);
      });
    });
  });
}
