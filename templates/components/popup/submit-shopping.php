<?php
isset($args['id']) ? $id = $args['id'] : $id = '';
isset($args['type']) ? $type = $args['type'] : $type = '';

?>
<div id="popupSubmitShopping" class="popup-submit-shopping">
    <div class="background-popup"></div>
    <div class="form-submit-shopping-wrapper">
        <div class="title-and-close-btn">
            <?php if ($type === 'shopping') : ?>
                <h2 class="popup-title ">ثبت سفارش </h2>
            <?php else : ?>
                <h2 class="popup-title ">ژیمناستیک بزرگسالان</h2>
            <? endif ?>
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
                <div class="<?php if ($type === 'class-register') echo 'in-class-form' ?>  from-field tel-information">
                    <label>تلفن همراه<span>*</span></label>
                    <input class="data input-field-component" name="phone" type="tel" placeholder="تلفن همراه" required>
                </div>
                <?php if ($type === 'class-register') : ?>
                    <div class="from-field ">
                        <label>سن<span>*</span></label>
                        <input class="data input-field-component" name="age" type="number" placeholder="سن" required>
                    </div>
                <?php endif ?>
                <input name="class" data-product="<?= $id  ?>" value="<?= $id  ?>" type="text" hidden>
            </div>
            <button id="shopping-form-submit" class="btn-submit-component"><i class="icon-note-book"></i>
                <?php ($type === 'class-register') ? print 'ثبت سفارش' : print 'ثبت عضویت';  ?>
            </button>
        </form>
    </div>

</div>