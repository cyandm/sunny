<div class="course-block">
    <div class="course-info">

        <div class="course-info-content">
            <div class="title">
                <h3></h3><span></span>
            </div>
            <div class="content">
                <div class="description"></div>
                <div class="detail">
                    <span><i></i></span>
                    <span><i></i></span>
                </div>

            </div>
            <div class="btn">
                <a href=""></a>
            </div>
        </div>
        <div class="course-img"></div>
    </div>

    <div class="course-form-block">
        <span class="show-form"><i class=""></i></span>
        <?php
        get_template_part(
            '/templates/pages/course/course-form',
            null,
            // ['id' => get_the_ID()]
        );
        ?>
    </div>
</div>