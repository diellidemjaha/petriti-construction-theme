<?php get_header(); ?>

<div class="container py-5">
    <div class="card-content">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="d-flex justify-content-center align-items-center"><?php the_title(); ?></h1>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card card-2"> -->
                            <!-- <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top">
                            <?php endif; ?> -->
                           
                            <!-- </div> -->
                            <h4 class="mb-5">
                                </h4>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- <div class="container mt-5">

                    </div> -->
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
