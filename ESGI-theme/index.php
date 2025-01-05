<?php

get_header();

?>

<div class="page-container template">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="page-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
    endif;
    ?>
</div>

<?php 

    if(is_front_page()) {
        include 'template-parts/about-us.php';
        include 'template-parts/services.php';
        include 'template-parts/partners.php';
    }

get_footer();

?>