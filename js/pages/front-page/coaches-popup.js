import { Swiper } from "swiper";

const coachesFront = document.querySelector("#coaches-front-slide");
if (coachesFront) {
  // const sliderPopups = document.querySelectorAll(".students-row-popup");

  const coaches = document.querySelectorAll(".coaches-content-slide");

  coaches.forEach((coach) => {
    const students = coach.querySelectorAll(".student-image");

    students.forEach((student) => {
      student.addEventListener("click", () => {
        const sliderPopup = coach.querySelector(".students-row-popup");

        const clone = sliderPopup.cloneNode(true);

        document.body.appendChild(clone);

        clone.classList.add("show");

        clone.classList.add("body-popup");

        document.body.style.overflow = "hidden";

        const swiper = new Swiper(".body-popup .students-slider-popup", {
          slidesPerView: "auto",
          spaceBetween: 20,
          breakpoints: {
            992: {
              slidesPerView: 2,
            },
          },
        });

        const closePopup = clone.querySelector(".close-student-popup");
        closePopup.addEventListener("click", () => {
          document.body
            .querySelector(".students-row-popup.show.body-popup")
            .classList.remove("show");
          document.body.style.overflow = "auto";

          setTimeout(() => {
            document.body.querySelector(".body-popup").remove();
          }, 500);

          const popVideos = coach.querySelectorAll(".add-video-content video");
          popVideos.forEach((video) => {
            video.pause();
          });
        });
      });
    });
  });
}
