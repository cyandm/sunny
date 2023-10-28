const descriptions = document.querySelectorAll(".slide-text-block ");

if (descriptions) {

    descriptions.forEach((description) => {
const des= description.querySelector(".start-description");

        if (des.clientHeight > 200) {
const more= description.querySelector(".more-content");

            more.classList.add("show");
        }
    });
}