const playIcons = document.querySelectorAll(".play-icon");

playIcons.forEach(function (playIcon) {
  playIcon.addEventListener("click", function () {
    // create popup
    const videoPopup = document.createElement("div");
    videoPopup.classList.add("video-popup");

    document.body.appendChild(videoPopup);

    // close popup
    const closePopupButton = videoPopup.querySelector(".close-popup");
    closePopupButton.addEventListener("click", () => {
      videoPopup.remove();
    });
  });
});
