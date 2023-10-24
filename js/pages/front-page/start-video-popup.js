import { createVideoPopup } from "../../modules/functions";

// *********************************video popup for frontpage
const startSection = document.querySelector("#start-section");

if (startSection) {
  const popupVideos = document.querySelectorAll(".popup-play-video");

  popupVideos.forEach((video) => {
    video.addEventListener("click", () => {

      const source = video
        .querySelector(".video-popup video source")
        .getAttribute("src");

      createVideoPopup(source);
    });
  });
}
