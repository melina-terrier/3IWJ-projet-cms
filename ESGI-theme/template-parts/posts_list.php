<?php
// Définir la page actuelle
if (!isset($paged)) {
    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
}
// Arguments pour la requête personnalisée
$args = [
    'posts_per_page' => 3,
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
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/default-thumbnail.jpg" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                </a>
                <div class="post-content">
                    <span class="post-category">
                        <?php the_category(', '); ?>
                    </span>
                    <h2 class="post-title">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                    </h2>
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
            'prev_text' => __('&laquo; Previous', 'yourtheme'),
            'next_text' => __('Next &raquo;', 'yourtheme'),
        ]);
        ?>
    </nav>
    <?php else : ?>
        <p><?php _e('No posts found.', 'yourtheme'); ?></p>
    <?php endif; ?>

    <?php
    // Restaure la requête principale (important)
    wp_reset_postdata();
    ?>
</div>