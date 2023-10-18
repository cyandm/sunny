import { createVideoPopup } from "../modules/functions";
const videoPage = document.querySelector("#video-page");

if (videoPage) {
  // ********************** video popup slider
  const overviewVideos = document.querySelectorAll(".slide-video-popup");
  console.log(overviewVideos);

  overviewVideos.forEach((video) => {
    video.addEventListener("click", () => {
      const coachSource = video
        .querySelector("video source")
        .getAttribute("src");

      createVideoPopup(coachSource);
    });
  });
}
