import {Swiper} from "swiper";
import {
    Navigation,
    Pagination,
} from "swiper/modules";

const about = document.querySelector("#about-page");
if (about && window.innerWidth > 992) {
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
                modules:[    Navigation,
                    Pagination,] ,
                slidesPerView: "auto",
                // loop: true,
                spaceBetween: 20,
                pagination: {
                    el: ".swiper-pagination",
                },
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

    const honorsBoxes = document.querySelectorAll(".honors-box");
    honorsBoxes.forEach((image) => {
        image.addEventListener("click", (e) => {
            const honorPopup = document.querySelector(".honors-images-popup");
            const cloneHonor = honorPopup.cloneNode(true);

            document.body.appendChild(cloneHonor);
            setTimeout(() => {
                cloneHonor.classList.add("show");
            }, 100);

            cloneHonor.classList.add("body-popup");

            document.body.style.overflow = "hidden";

            const swiper = new Swiper(".body-popup .honors-slider", {
                modules:[    Navigation,
                    Pagination,] ,
                slidesPerView: "auto",
                // loop: true,
                spaceBetween: 20,
                pagination: {
                    el: ".swiper-pagination",
                },
                breakpoints: {
                    992: {
                        slidesPerView: 2,
                    },
                },

            });

            const closeHonorPopup = cloneHonor.querySelector(".close-honors-popup");
            closeHonorPopup.addEventListener("click", () => {
                cloneHonor.classList.remove("show");

                document.body.style.overflow = "auto";

                setTimeout(() => {
                    document.body.querySelector(".body-popup").remove();
                }, 500);
            });
        });
    });
}
