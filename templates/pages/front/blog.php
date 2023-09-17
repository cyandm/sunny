<?php
$termID = $cat->term_id;
$newQueryArgs = [
    'post_type' => "post",
    'posts_per_page' => 999,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'     => $termID,
            'operator'  => 'IN'
        ]
    ]
];
$allProducts = new WP_Query($newQueryArgs);
?>

<section id="blog" class="blog-section">
    <div class="container">
        <div class="section-title">
            <h2>

            </h2>
            <a href=""></a>
        </div>
    </div>

    <div class="front-blog-content">
        <div class="front-blog-tab">
            <ul>
                <li>

                </li>
            </ul>
        </div>
        <div class="row-front-blog">
        <div class="front-blog-box">

        </div>
        </div>
    </div>
    <div class="breadcrumb-btn">
        <a href="" class="btn-right"><i class="icon-arrow-side-right"></i></a>
        <a href="" class="btn-left"><i class="icon-arrow-side-left"></i></a>
    </div>
</section>