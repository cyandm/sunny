
<?php
get_header()
?>
    <main class=" 404">
        <section class="container">
            <div class="unfind-row">
                <div class="unfind-content" id="not-fond-animation" >
                    <div class="img">
                        <?php
                        get_template_part('imgs/svg/404');?>
                    </div>
                    <h3>متاسفانه صفحه مورد نظر یافت نشد</h3>
                    <div class="btn-row"><a href="/" class="btn">بازگشت به صفحه اصلی</a></div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>