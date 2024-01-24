<?php
isset($args['product_id']) ? $id = $args['product_id'] : $id = '';
?>
<div id="popupSubmitShopping" class="popup-submit-shopping">
    <div class="background-popup"></div>
    <div class="form-submit-shopping-wrapper">
        <div class="title-and-close-btn">
            <h2 class="popup-title ">ثبت سفارش </h2>
            <i class="icon-close btn-close-component" id="btnClosePopupShopping"></i>
        </div>
        <form class="form-submit-shopping" id="shopping-form">
            <div class="input-group-popup-wrapper">
                <div class="from-field">
                    <label>نام<span>*</span></label>
                    <input class="data input-field-component" name="name" type="text" placeholder="نام" required>
                </div>
                <div class=" from-field">
                    <label>نام خانوادگی<span>*</span></label>
                    <input class=" data input-field-component" name="last-name" type="text" placeholder="نام خانوادگی" required>
                </div>
                <div class=" from-field tel-information">
                    <label>تلفن همراه<span>*</span></label>
                    <input class="data input-field-component" name="phone" type="tel" placeholder="تلفن همراه" required>
                </div>
                <input name="product" type="hidden" class="input-field-component" value="<?php $id  ?>">

            </div>
            <button id="shopping-form-submit" class="btn-submit-component"><i class="icon-note-book"></i>ثبت سفارش</button>
        </form>
    </div>

</div>