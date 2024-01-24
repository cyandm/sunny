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

  const shoppingFormSubmit = $('#shopping-form #shopping-form-submit');

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
        $(shoppingFormSubmit).text('ارسال شد');
        setTimeout(() => {
          $(shoppingFormSubmit).text('سفارش');
        }, 1000);
      },
      error: (err) => {
        console.error(err);
        $(shoppingFormSubmit).removeClass('pending');
        $(shoppingFormSubmit).addClass('error');
      },
    });
  });
});
