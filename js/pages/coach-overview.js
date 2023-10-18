import { createVideoPopup } from "../modules/functions";

const coaches = document.querySelectorAll(".coaches-content-slide");

if (coaches) {
  coaches.forEach((coach) => {
    const students = coach.querySelectorAll(".student-image");

    students.forEach((student) => {
      student.addEventListener("click", () => {
        const sliderPopup = coach.querySelector(".students-row-popup");
        console.log(sliderPopup);
        sliderPopup.classList.add("show");
        document.body.style.overflow = "hidden";
      });
    });
    const closePopup = coach.querySelector(".close-student-popup");
    if (closePopup) {
      closePopup.addEventListener("click", () => {
        coach
          .querySelector(".students-row-popup.show")
          .classList.remove("show");
        document.body.style.overflow = "auto";
      });
    }
  });

  // ********************** video popup
  const coachPopupVideos = document.querySelectorAll(
    ".popup-play-video-classes"
  );
  console.log(coachPopupVideos);
  coachPopupVideos.forEach((video) => {
    video.addEventListener("click", () => {
      const coachSource = video
        .querySelector(".video-popup video source")
        .getAttribute("src");

      createVideoPopup(coachSource);
    });
  });
}
