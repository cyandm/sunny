<section id="package" class="package-content">
    <div class="container">
        <div class="section-title">
            <h2>

            </h2>
            <a href=""></a>
        </div>
    </div>

    <div class="package-content">

        <?php
        get_template_part(
            '/templates/components/card-blog',
            null,
            ['id' => get_the_ID()]
        ); ?>

    </div>
    <div class="breadcrumb-btn">
        <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
        <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
    </div>
</section>