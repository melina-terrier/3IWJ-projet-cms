<?php
echo '<section class="members">';
echo '<h2>Our Team</h2>';
$args = array(
    'post_type' => 'members',
    'posts_per_page' => -1, // Affiche tous les membres
    'post_status' => 'publish', // Affiche uniquement les articles publiés
);
$members_query = new WP_Query($args);

if ($members_query->have_posts()) :
    echo '<section class="members_list">';
    while ($members_query->have_posts()) : $members_query->the_post();
        // Récupère l'image mise en avant
        $member_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        // Récupère le titre
        $member_title = get_the_title();
        // Récupère le contenu
        $member_content = get_the_content();

        // Affiche chaque membre avec son image, titre et contenu
        if (!empty($member_image) && !empty($member_title) && !empty($member_content)) :
            echo '<div class="member">';
            echo '<img src="' . esc_url($member_image) . '" alt="' . esc_attr($member_title) . '" class="member-image">';
            echo '<h4>' . esc_html($member_title) . '</h4>';
            echo '<p>' . wpautop($member_content) . '</p>';
            echo '</div>';
        endif;
    endwhile;
echo '</section>';
else :
    echo '<p>' . __('No members found.', 'esgi') . '</p>';
endif;
echo '</section>';
?>