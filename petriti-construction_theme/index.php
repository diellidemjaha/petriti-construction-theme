<?php

/**
 * Template Name: Home Page
 */ ?>

<head>

    <?php
    get_header(); ?>

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php wp_head(); ?>
</head>
<script>
    $(document).ready(function() {
        $('.home_slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            autoplay: true,
            autoplaySpeed: 2000,
            fade: true,
            cssEase: 'linear',
            dots: true, // Add dots for navigation
            arrows: false, // Remove previous and next buttons
            swipe: true,
            fade: false,
            //  rtl: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>

<div class="site-main">
    <div class="home_slider" dir>
        <?php
        // Query to retrieve images from the custom post type "image_gallery"
        $args = array(
            'post_type' => 'slider_gallery',
            'posts_per_page' => -1,
        );

        $image_posts = new WP_Query($args);

        if ($image_posts->have_posts()) {
            while ($image_posts->have_posts()) {
                $image_posts->the_post();
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'custom-post-image']);
                }
            }
        }
        ?>
    </div>

    <div class="main-card">
        <?php
        // Query to retrieve text content from the custom post type "text_content"
        $args = array(
            'post_type' => 'text_content',
            'posts_per_page' => 1, // Assuming you have one main text content
        );

        $text_posts = new WP_Query($args);

        if ($text_posts->have_posts()) {
            while ($text_posts->have_posts()) {
                $text_posts->the_post();
        ?>
                <!-- <div class="card-body"> -->
                <?php the_content(); // Display text content 
                ?>
                <!-- </div> -->
        <?php
            }
        }
        ?>
    </div>
    <!-- </div> -->
    <!-- </div> -->
    <div class="container my-5">
        <div class="row mb-5">
            <h1 class="text-center mb-5 mt-5">LAJMET E FUNDIT</h1><br><br><br>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3
            );

            $posts_sticker = new WP_Query($args);
            if ($posts_sticker->have_posts()) {
                while ($posts_sticker->have_posts()) {
                    $posts_sticker->the_post();
                    ?>
  
                    <div class="col-md-6 col-lg-4  col-12 mb-4 d-flex justify-content-center">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card">
                                <?php
                                if (has_post_thumbnail()) {
                                    // Display the post thumbnail (featured image)
                                    the_post_thumbnail('large', ['class' => 'card-img-top']);
                                }
                                ?>
                                <div class="card-body">
                                    <a class="links text-decoration-none" href="<?php the_permalink(); ?>" rel="bookmark">
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                    </a>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <div class="text-center row justify-content-center my-2">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <a href="<?php the_permalink(); ?>" class="card-button">Mëso më shumë</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "nuk ka lajme";
            }
            ?>
            <div class="text-center">
                <a href="<?php echo home_url('/lajme'); ?>" class="btn btn-default"><b>Shiko më shumë lajme</b></a>
            </div>
        </div>


        <!-- New container for social media links and contact information -->
        <!-- <div class="container-fluid bg-light py-5 mb-3"> -->
        <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h1 class="mb-5 text-center">RRETH NESH</h1>
            <a href="<?php echo home_url('/rreth-nesh'); ?>">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/01.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Petriti C. si kompani vendore</h5>
                        <span class="card-text">
                            Jemi kompani e konstrucionit me renome ne te gjithe vendin.
                        </span>
                    </div>
                </div>
            </a>
            <div class="text-center m-3">
                <a href="<?php echo home_url('/rreth-nesh'); ?>" class="btn btn-default"><b>shko tek faqja Rreth nesh</b></a>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <h1 class="mb-5 text-center">KONTAKTI</h1>
            <a href="<?php echo home_url('/kontakti'); ?>">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/02.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Jemi ne gatishmeri te bashkpunojme</h5>
                        <p class="card-text">Na kontaktoni qe te leni takim me ne.</p>
                    </div>
                </div>
            </a>
            <div class="text-center m-3">
                <a href="<?php echo home_url('/kontakti'); ?>" class="btn btn-default"><b>Shko tek faqja KONTAKTI</b></a>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <h1 class="mb-5 text-center">VIDEO</h1>
            <a href="<?php echo home_url('/video'); ?>">
                <div class="card">
                    <img src="<?php echo get_template_directory_uri(); ?>/03.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Shiqoni videot tona</h5>
                        <p class="card-text">Kuptojeni se ku gjendemi dhe se si e bejme punen</p>
                    </div>
                </div>
            </a>
            <div class="text-center m-3">
                <a href="<?php echo home_url('/video'); ?>" class="btn btn-default"><b>Shko tek faqja VIDEO</b></a>
            </div>
        </div>
    </div>
</div>

</div>


</div>
                   

            
        
        <div class="py-5 mb-3 mx-5">
            <!-- <div class="row"> -->
            <div class="col-md-6 linqet my-5 flex align-items-center">
                <!-- Add your social media links here -->
                <h3>Na ndiqni ne rrjetet sociale:</h4>
                    <!-- Add your social media icons/links here -->
                    <a href="#" class="btn btn-primary">Facebook</a>
                    <a href="#" class="btn btn-danger">Instagram</a>
                    <!-- Add more social media links/buttons as needed -->
            </div>
            <div class="col-md-6 linqet">
                <!-- Add your contact information here -->
                <h3>Na kontaktoni:</h4>
                    <p><b>Email:</b> petriti-construction@gmail.org</p>
                    <p><b>Phone:</b> +383 44 11 22 33</p>
            </div>
            <!-- </div> -->
        </div>


</main>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
</div>

<?php get_footer(); ?>