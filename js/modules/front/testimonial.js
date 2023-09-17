
const playIcons = document.querySelectorAll('.play-icon');

playIcons.forEach(function (playIcon) {
    playIcon.addEventListener('click', function () {
        // create popup
        const videoPopup = document.createElement('div');
        videoPopup.classList.add('video-popup');
        videoPopup.innerHTML = '<video controls autoplay>\
                <source src="video.mp4" type="video/mp4">\
                مرورگر شما از ویدیو پشتیبانی نمی‌کند.\
                </video>\
                <button class="close-popup">&#10006;</button>';

        document.body.appendChild(videoPopup);

        // close popup
        const closePopupButton = videoPopup.querySelector('.close-popup');
        closePopupButton.addEventListener('click', function () {
            videoPopup.remove();
        });
    });
});




