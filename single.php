<?php
get_header()
?>
    <?php

    if (get_queried_object()->post_type == 'post') :

        get_template_part('templates/pages/single-blog');


    endif;
    ?>


<?php get_footer(); ?>