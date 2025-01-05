<?php get_header(); ?>

<div class="page-container search-results wrapper">
    <h1><?php printf(__('Search results for: <span class="search-element">%s</span>', 'esgi'), get_search_query()); ?></h1>

    <?php if (have_posts()) : ?>
        <ul class="search-results-list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="search-result-item">
                    <h4 class="search-result-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <div class="search-result-meta">
                        <?php
                        $categories = get_the_category_list(', ');
                        $date = get_the_date();

                        if ($categories) {
                            echo '<span class="search-result-category">' . $categories . '</span>';
                        }

                        if ($date) {
                            // Ajouter la virgule uniquement si les catégories existent
                            echo '<span class="search-result-date">';
                            echo $categories ? ', ' : '';
                            echo $date;
                            echo '</span>';
                        }
                        ?>
                    </div>

                    <div class="search-result-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>

    <?php else : ?>
        <p>Aucun élément trouvé.</p>
    <?php endif; ?>
</div>

<?php 
get_footer(); 
?>
