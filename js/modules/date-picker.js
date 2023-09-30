

const threeWeeksLater = new persianDate().add('days', 21).valueOf();
const now = new Date(1601888766075).getTime();

const options = {
    altField: '#datepicker',
    altFieldFormatter: function (unix) {
        return new persianDate(unix).format();
    },
    minDate: now,
    maxDate: threeWeeksLater,
    onSelect: function (unix) {
        console.log('datepicker select: ' + unix);
    }
}

const datePicker = new Datepicker(document.querySelector('.date-picker-custom'), options);