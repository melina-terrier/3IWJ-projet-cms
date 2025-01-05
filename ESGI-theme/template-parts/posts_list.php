<?php

if (!isset($paged)) {
    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
}

$args = [
    'posts_per_page' => 2,
    'paged'          => $paged,
];

$the_query = new WP_Query($args);
?>

<div class="post-list">
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <article class="post-item">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="post-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>
                </a>
                <span class="post-category">
                    <?php the_category(', '); ?>
                </span>
                <div class="post-content">
                    <h4 class="post-title">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                    </h4>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <nav class="post-list-pagination">
        <?php
        echo paginate_links([
            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'    => '?paged=%#%',
            'current'   => max(1, $paged),
            'total'     => $the_query->max_num_pages,
            'prev_text' => '', // Texte vide pour masquer "précédent"
            'next_text' => '', // Texte vide pour masquer "suivant"
        ]);
        ?>
    </nav>

    <?php else : ?>
        <p><?php _e('No posts found.', 'esgi'); ?></p>
    <?php endif; ?>

    <?php
    // Restaure la requête principale (important)
    wp_reset_postdata();
    ?>
</div>