<?php

get_header();

?>

<div class="page-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('large', ['style' => 'max-width: 100%; height: auto;']); ?>
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
        echo '<section class="services">';
        echo '<h2>Our Services</h2>';
        include 'template-parts/services.php';
        echo '</section>';
        echo '<section class="partners">';
        $partner_title = get_theme_mod('partners_title', '');
        echo '<h2>'.$partner_title.'</h2>';
        include 'template-parts/partners.php';
        echo '</section>';
    }

get_footer();

?>