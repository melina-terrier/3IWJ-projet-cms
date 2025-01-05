<?php get_header(); ?>

<div class="page-container single-post-layout wrapper">
    <h1 class="post-title"><?php the_title(); ?></h1>
    
    <div class="row">
     
        <?php get_sidebar(); ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>


                <div class="post-meta">
                    <span class="post-category">
                        <?php the_category(', '); ?>
                    </span>
                    <span class="post-date">
                    - <?php echo get_the_date(); ?>
                    </span>
                </div>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="post-tags">
                        <?php
                        $post_tags = get_the_tags();
                        if ($post_tags) {
                            echo '<ul class="tags-list">';
                            foreach ($post_tags as $tag) {
                                echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>

                    <!-- Comments Section -->
                    <div class="post-comments">
                        <?php 
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif; 
                        ?>
                    </div>
                </article>
            <?php endwhile; else : ?>
                <p><?php esc_html_e('Aucun post ne correspond.', 'esgi'); ?></p>
            <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
