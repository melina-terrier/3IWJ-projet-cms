<?php 
get_header(); 
?>

<div id="site-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"></div>
            <?php if (have_posts()) : ?>
                <header class="archive-header">
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
                            _e('Blog', 'yourtheme');
                        }
                        ?>
                    </h1>
                </header>

                <!-- Liste des articles -->
                <div id="ajax-response">
                    <?php include('template-parts/posts_list.php'); ?>
                </div>
            <?php else : ?>
                <p><?php _e('No posts found.', 'yourtheme'); ?></p>
            <?php endif; ?>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
