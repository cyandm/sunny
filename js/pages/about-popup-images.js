import { Swiper } from "swiper";

const about = document.querySelector("#about-page");
if (about) {
  const galleryBoxes = document.querySelectorAll(".gallery-box");

  galleryBoxes.forEach((image) => {
    image.addEventListener("click", (e) => {
      const galleryPopup = document.querySelector(".gallery-images-popup");
      const cloneGallery = galleryPopup.cloneNode(true);

      document.body.appendChild(cloneGallery);
      setTimeout(() => {
        cloneGallery.classList.add("show");
      }, 100);

      cloneGallery.classList.add("body-popup");

      document.body.style.overflow = "hidden";

      const swiper = new Swiper(".body-popup .gallery-slider", {
        slidesPerView: "auto",
        loop: true,
        spaceBetween: 20,
        breakpoints: {
          992: {
            slidesPerView: 2,
          },
        },
      });

      const closeGalleryPopup = cloneGallery.querySelector(
        ".close-gallery-popup"
      );
      closeGalleryPopup.addEventListener("click", () => {
        cloneGallery.classList.remove("show");

        document.body.style.overflow = "auto";

        setTimeout(() => {
          document.body.querySelector(".body-popup").remove();
        }, 500);
      });
    });
  });
}
