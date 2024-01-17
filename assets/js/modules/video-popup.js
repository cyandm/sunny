import { createVideoPopup } from './functions';

// ************************ video popup
const videoPopup = document.querySelector('#video-popup');
if (videoPopup) {
  videoPopup.addEventListener('click', () => {
    const sourceUrl = videoPopup
      .querySelector('.video-popup video source')
      .getAttribute('src');

    createVideoPopup(sourceUrl);
  });
}
