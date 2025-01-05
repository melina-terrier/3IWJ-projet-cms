<?php 
get_header(); 
?>

<div class="page-container wrapper archive">

            <?php if (have_posts()) : ?>
                
                    <h1 class="archive-title">
                        <?php
                        if (is_category()) {
                            single_cat_title();
                        } elseif (is_tag()) {
                            single_tag_title();
                        } elseif (is_author()) {
                            the_author();
                        } elseif (is_date()) {
                            echo get_the_date();
                        } else {
                            _e('Blog.', 'esgi');
                        }
                        ?>
                    </h1>

            <div class="row">

        <?php get_sidebar(); ?>
                <div id="ajax-response">
                    <?php include('template-parts/posts_list.php'); ?>
                </div>
            <?php else : ?>
                <p><?php _e('No posts found.', 'esgi'); ?></p>
            <?php endif; ?>

            </div>

</div>

<?php get_footer(); ?>
