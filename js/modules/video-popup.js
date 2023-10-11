import { createVideoPopup } from "../modules/functions";

// *********************************video popup for frontpage
const popupVideos = document.querySelectorAll(".popup-play-video");
if (popupVideos) {
  popupVideos.forEach((video) => {
    video.addEventListener("click", () => {
      const source = video
        .querySelector(".video-popup video source")
        .getAttribute("src");

      createVideoPopup(source);
    });
  });
}

// ************************ video popup
const videoPopup = document.querySelector("#video-popup");
if (videoPopup) {
  videoPopup.addEventListener("click", () => {
    const sourceUrl = videoPopup
      .querySelector(".video-popup video source")
      .getAttribute("src");

    createVideoPopup(sourceUrl);
  });
}
