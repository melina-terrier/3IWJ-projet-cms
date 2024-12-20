<?php get_header(); ?>

<div class="search-results">
    <h1><?php printf(__('Search Results for: %s', 'esgi-theme'), get_search_query()); ?></h1>

    <?php if (have_posts()) : ?>
        <ul class="search-results-list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-result-item">
                    <h2 class="search-result-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="search-result-meta">
                        <span class="search-result-date"><?php echo get_the_date(); ?></span>
                        <span class="search-result-category">
                            <?php echo get_the_category_list(', '); ?>
                        </span>
                    </div>
                    <div class="search-result-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>

    <?php else : ?>
        <p><?php _e('Sorry, no results found.', 'your-theme'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
