<?php
$post_id = '';
if ($args['id']) {
    $post_id = $args['id'];
}
$key='';
if ($args['key-form'] ) {
    $key = $args['key-form'];
}

?>
<div class="course-form">
    <div class="details-course">
        <div><i class="icon-arrow-side-left"></i><span>جزئیات کلاس</span></div>
    </div>
    <div class="form">
        <form action="" class="send-course-form" id="course-form-<?= $post_id ?>" data-key="<?= $key?>">
            <div class="form-wrapper">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" value="" placeholder="نام">
            </div>

            <div class="form-wrapper">
                <label for="last_name">نام خانوادگی</label>
                <input type="text" id="last_name" name="last_name" value="" placeholder="نام خانوادگی">
            </div>

            <div class="form-wrapper">
                <label for="phone">تلفن همراه</label>
                <input type="text" id="phone" name="phone" value="" placeholder="تلفن همراه">
            </div>

            <div class="form-wrapper">
                <label for="date">تاریخ تولد</label>
                <div class="input">
                    <input type="text" id="date-picker" name="date" value="" class="date-picker-custom" placeholder="تاریخ تولد">
                    <i class="icon-calendar"></i>
                </div>
            </div>
            <input type="hidden" name="course_id" value="<?= $post_id ?>" disabled>

            <div class="form-btn">
                <button id="course-submit-form" type="submit">
                    <i class="icon-note-book"></i>
                    ثبت عضویت
                </button>

            </div>
        </form>
        <div class="form-message success" id="success_message"></div>
        <div class="form-message fail" id="fail_message"></div>
    </div>
    <div class="circle-content">
        <div class="circle">
            <div class="multi-circle-animate circle-1"></div>
            <div class="multi-circle-animate circle-2"></div>
            <div class="multi-circle-animate circle-3"></div>
        </div>
    </div>

</div>