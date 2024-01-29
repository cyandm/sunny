// const courseForms = document.querySelectorAll('.send-course-form');

// if (courseForms) {
//   courseForms.forEach((courseForm, index) => {
//     // const key=courseForm.getAttribute('data-key') ;

//     // const id =
//     //   "course-form-" +
//     //   courseForm.querySelector('input[name="course_id"]').value;

//     courseForm.addEventListener('submit', (e) => {
//       e.preventDefault();
//       console.log('base form');
//       console.log(e.target);

//       let submitForm = e.target.querySelector('button');
//       console.log(submitForm);
//       submitForm.disabled = false;

//       let successMessage =
//         courseForm.parentElement.querySelector('#success_message');
//       let failMessage = courseForm.parentElement.querySelector('#fail_message');
//       successMessage.innerHTML = '';
//       failMessage.innerHTML = '';

//       let allData = [];

//       e.target.querySelectorAll('input').forEach((element) => {
//         allData[element.getAttribute('name')] = element.value;
//       });

//       console.log(allData);
//       let errors = [];

//       Object.entries(allData).forEach(([key, value]) => {
//         const fieldName = (fieldName) => {
//           if (fieldName === 'name') {
//             return 'نام ';
//           }
//           if (fieldName === 'last_name') {
//             return 'نام خانوادگی ';
//           }
//           if (fieldName === 'phone') {
//             return 'شماره تماس ';
//           }
//           if (fieldName === 'date') {
//             return ' تاریخ تولد';
//           }
//           if (fieldName === 'course_id') {
//             return ' شماره دوره';
//           }
//         };

//         const sanitizeInput = (input) => {
//           const symbolsPattern =
//             /[\!\@\#\$\%\^\&\*\)\(\+\=\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-]/;

//           if (input.match(symbolsPattern)) {
//             return 'لطفا ' + fieldName(key) + ' مناسب وارد کنید ';
//           }
//         };

//         // validate Phone function
//         const checkMobile = (tel) => {
//           const mobilePattern = /^(\+98|0)?9\d{9}$/;

//           if (!tel.match(mobilePattern)) {
//             return 'لطفا شماره تلفن وارد کنید ';
//           }
//         };

//         //validate birth day date
//         const checkDate = (date) => {
//           const datePattern =
//             /^(13\d{2}|14\d{2}|15\d{2}|16\d{2}|17\d{2}|18\d{2}|19\d{2}|20\d{2})\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/;

//           if (!date.match(datePattern)) {
//             return 'لطفا تاریخ را به فرمت صحیح وارد کنید (مثال: 1385/07/11).';
//           }
//         };

//         //validate course id
//         const integer = (id) => {
//           const isInteger = Number.isInteger(parseInt(id));
//           if (!isInteger) {
//             return 'لطفا شماره دوره را وارد کنید';
//           }
//         };

//         // input is empty
//         if (value === '') {
//           let error = fieldName(key) + '  ضروری است ';
//           errors.push(error);
//         }
//         if (
//           !value == '' &&
//           key != 'phone' &&
//           key != 'date' &&
//           key != 'course_id'
//         ) {
//           errors.push(sanitizeInput(value));
//         }

//         // input is date
//         if (key == 'date' && !value == '') {
//           errors.push(checkDate(value));
//         }
//         // input is phone
//         if (key == 'phone' && !value == '') {
//           errors.push(checkMobile(value));
//         }
//         // input is course id
//         if (key == 'course_id' && !value == '') {
//           errors.push(integer(value));
//         }
//       });

//       const isArrayEmptyOrAllUndefined = (array) => {
//         console.log(array);

//         if (array.length === 0) {
//           return true; // The array is empty
//         }

//         for (const element of array) {
//           if (element !== undefined) {
//             // If any element is defined, return false
//             return false;
//           }
//         }
//         // If no element is defined, return true
//         return true;
//       };

//       if (isArrayEmptyOrAllUndefined(errors)) {
//         //const newSliders = JSON.stringify(allData);
//         const xhr = new XMLHttpRequest();

//         xhr.open('POST', ajax_var.url, true);

//         xhr.setRequestHeader(
//           'Content-Type',
//           'application/x-www-form-urlencoded'
//         );
//         console.log('before on ready state');

//         xhr.onreadystatechange = () => {
//           if (xhr.readyState === 4 && xhr.status === 200) {
//             const response = JSON.parse(xhr.responseText);
//             if (response.success === true) {
//               console.log(response);
//               response.data;
//               submitForm.disabled = false;
//               Array.from(courseForm.querySelectorAll('input')).forEach(
//                 (element) => {
//                   element.value = '';
//                   element.disabled = true;
//                   element.classList.add('disabled');
//                   submitForm.style.display = 'none';
//                 }
//               );

//               successMessage.innerHTML =
//                 response.message +
//                 '<div class="form-message-close"><i class="icon-close"></i></div>';
//               successMessage.innerHTML += '</ul>';
//               successMessage.classList.add('show');
//             }
//           }
//         };
//         const formData = new URLSearchParams();
//         formData.append('action', 'course_form');
//         formData.append('_nonce', ajax_var.nonce);

//         for (const [key, value] of Object.entries(allData)) {
//           formData.append(key, value);
//         }

//         xhr.send(formData);
//       } else {
//         submitForm.disabled = false;
//         failMessage.innerHTML = '';
//         failMessage.innerHTML =
//           '<ul><div class="form-message-close"><i  class="icon-close"></i></div></ul>';
//         errors.forEach((v) => {
//           if (v !== undefined) {
//             failMessage.querySelector('ul').innerHTML +=
//               '<li> - ' + v + '</li>';
//           }
//         });
//         failMessage.innerHTML += '</ul>';
//         failMessage.classList.add('show');
//       }

//       const formMessageCloseButtons = document.querySelectorAll(
//         '.form-message-close'
//       );

//       formMessageCloseButtons.forEach((button) => {
//         button.addEventListener('click', (e) => {
//           e.preventDefault();
//           closeToaster();
//         });
//       });

//       document.body.addEventListener('click', (e) => {
//         closeToaster();
//       });

//       const closeToaster = () => {
//         const formMessages = document.querySelectorAll('.form-message');
//         formMessages.forEach((message) => {
//           message.classList.remove('show');
//         });
//       };
//     });
//   });
// }

function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}
jQuery(document).ready(($) => {
  const courseForm = $('#shopping-form');
  const courseFormInput = document.querySelectorAll('#shopping-form .data');
  const popupCourse = document.getElementById('popupSubmitShopping');
  const courseFormSubmit = $('#shopping-form #shopping-form-submit');
  const cardSuccessful = $('#cardSuccessfulNotif');
  $(courseForm).on('submit', (e) => {
    e.preventDefault();

    const formDataArray = $(courseForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      data: {
        action: 'cyn_course_form',
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: (res) => {
        console.warn(res);
        courseFormInput.forEach((el) => {
          el.value = '';
        });
        $(popupCourse).removeAttr('active');

        setTimeout(() => {
          $(cardSuccessful).addClass('active');
        }, 500);
      },
      error: (err) => {
        console.error(err);
        $(courseFormSubmit).removeClass('pending');
        $(courseFormSubmit).addClass('error');
      },
    });
  });
});
