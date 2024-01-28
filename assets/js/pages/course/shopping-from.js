function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}
jQuery(document).ready(($) => {
  const shoppingForm = $('#shopping-form');
  const shoppingFormInput = document.querySelectorAll('#shopping-form .data');
  const popupShopping = document.getElementById('popupSubmitShopping');
  const shoppingFormSubmit = $('#shopping-form #shopping-form-submit');
  const cardSuccessfulNotif = $('#cardSuccessfulNotif');
  $(shoppingForm).on('submit', (e) => {
    e.preventDefault();

    const formDataArray = $(shoppingForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      data: {
        action: 'cyn_shopping_form',
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: (res) => {
        console.warn(res);
        shoppingFormInput.forEach((el) => {
          el.value = '';
        });
        $(popupShopping).removeAttr('active');

        setTimeout(() => {
          $(cardSuccessfulNotif).addClass('active');
        }, 500);
      },
      error: (err) => {
        console.error(err);
        $(shoppingFormSubmit).removeClass('pending');
        $(shoppingFormSubmit).addClass('error');
      },
    });
  });
});
