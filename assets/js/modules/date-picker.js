const formsDates = document.querySelectorAll('.send-course-form');

if (formsDates) {
  formsDates.forEach((form) => {
    const date = form.querySelector('.date-picker-custom');
    jalaliDatepicker.startWatch({
      minDate: 'attr',
      maxDate: 'attr',
    });

    date.addEventListener('click', () => {
      date.focus();
      jalaliDatepicker.hide();
      jalaliDatepicker.show(date);
    });
  });
}
