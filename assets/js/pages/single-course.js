const popupSubmitCourseHandler = document.getElementById('btnRegister');
const popupSubmitCourse = document.getElementById('popupSubmitShopping');
const popupSubmitCourseBGColor = document.querySelector(
  '#popupSubmitShopping .background-popup'
);
const btnCloseNotification = document.querySelector(
  '#cardSuccessfulNotif .btn-close-notif'
);
const notification = document.getElementById('cardSuccessfulNotif');

const btnClosePopupClose = document.getElementById('btnClosePopupShopping');

if (popupSubmitCourseHandler) {
  popupSubmitCourseHandler.addEventListener('click', () => {
    if (!popupSubmitCourseHandler.hasAttribute('disabled')) {
      if (popupSubmitCourse) {
        popupSubmitCourse.setAttribute('active', '');
      }
    }
  });
}

if (btnClosePopupClose) {
  btnClosePopupClose.addEventListener('click', () => {
    btnClosePopupClose.removeAttribute('active');
  });
}

if (popupSubmitCourseBGColor) {
  popupSubmitCourseBGColor.addEventListener('click', () => {
    popupSubmitCourse.removeAttribute('active');
  });
}
if (btnCloseNotification) {
  btnCloseNotification.addEventListener('click', () => {
    notification.classList.remove('active');
  });
}
