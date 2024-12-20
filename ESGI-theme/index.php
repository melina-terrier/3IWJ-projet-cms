<?php

get_header();

?>

<div class="page-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['style' => 'max-width: 100%; height: auto; margin-bottom: 20px;']); ?>
                <div class="featured-image">
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

    if(is_front_page()){ 
        include 'template-parts/about-us.php';
        include 'template-parts/services.php';
        include 'template-parts/partners.php';
    }

get_footer();

?>