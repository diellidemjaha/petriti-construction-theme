<?php
/**
 * Template Name: Kontakti Page
 */
get_header(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Slick Slider -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<?php wp_head(); ?>
<section>
    <div class="single-image">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'custom-thumbnail']);
                } ?>
    </div></section>
<section class="custom-card">
        <div class="card-content p-5">

                <?php
                the_title('<h1>', '</h1>');
                the_content(); 
            }
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>
