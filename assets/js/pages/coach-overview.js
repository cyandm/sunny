import { createVideoPopup } from '../modules/functions';

const coaches = document.querySelectorAll('.coaches-content-slide');

if (coaches) {
  const coachesOverview = document.querySelector('.coaches-overview');
  if (coachesOverview) {
    coaches.forEach((coach) => {
      const students = coach.querySelectorAll('.student-image');

      students.forEach((student) => {
        student.addEventListener('click', () => {
          const sliderPopup = coach.querySelector('.students-row-popup');

          sliderPopup.classList.add('show');
          document.body.style.overflow = 'hidden';
        });
      });
      const closePopup = coach.querySelector('.close-student-popup');
      if (closePopup) {
        closePopup.addEventListener('click', () => {
          coach
            .querySelector('.students-row-popup.show')
            .classList.remove('show');
          document.body.style.overflow = 'auto';
          const popVideos = coach.querySelectorAll('.add-video-content video');
          popVideos.forEach((video) => {
            video.pause();
          });
        });
      }
    });
  }

  // ********************** video popup
  const coachPopupVideos = document.querySelectorAll(
    '.popup-play-video-classes'
  );

  coachPopupVideos.forEach((video) => {
    video.addEventListener('click', () => {
      const coachSource = video
        .querySelector('.video-popup video source')
        .getAttribute('src');

      createVideoPopup(coachSource);
    });
  });
}
