<?php
/**
 * Template Name: Services template
 * Description: A custom template for the services page.
 */

get_header();
?>

<div class="page-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
        
            <h1><?php the_title(); ?></h1>
            <section class="services">
            <?php
            include 'template-parts/services.php';
            ?>
            </section>

            <div class="page-content">
                <?php the_content(); ?>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image">
                    <?php the_post_thumbnail('large', ['style' => 'max-width: 100%; height: auto;']); ?>
                </div>
            <?php endif; ?>

        <?php 
        endwhile;
    endif;
    ?>
</div>


<?php
get_footer();
?>
