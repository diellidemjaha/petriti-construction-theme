<?php 
/**
 * Template Name: Sherbimet Page
 */
 get_header(); ?>
 
 <!-- Slick Slider -->
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
 <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
 <?php wp_head(); ?>
<body>

    <div class="custom-card container py-5">
        <div class="card-content">

<h1 class="d-flex justify-content-center align-items-center"><?php the_title(); ?></h1>
<div class="container mt-5">
    <div class="row">
        <?php
        // Query the custom post type "PDF Documents"
        $args = array(
            'post_type' => 'sherbimet', // Replace with your custom post type name
            'posts_per_page' => -1,       // Show all posts
        );
        $pdf_query = new WP_Query($args);

        if ($pdf_query->have_posts()) :
            while ($pdf_query->have_posts()) :
                $pdf_query->the_post();
        ?>
                <div class="col-md-6 col-lg-4  col-12 mb-4 d-flex justify-content-center">
                    <div class="card card-2">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text">
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'Nuk gjindet asnje sherbim.';
        endif;
        ?>
    </div>
</div>

</div></div>
<?php get_footer(); ?>