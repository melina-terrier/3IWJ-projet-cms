<footer id="site-footer">

    <div class="row">
        <?php
        // Vérification et affichage du logo
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo_image) {
                echo '<a href="' . esc_url(home_url('/')) . '" class="logo">';
                $logo_url = $logo_image[0];
                if (strpos($logo_url, '.svg') !== false) {
                    $svg_content = @file_get_contents($logo_url); // @ pour éviter les warnings en cas d'erreur
                    if ($svg_content) {
                        echo $svg_content;
                    }
                } else {
                    echo '<img src="' . esc_url($logo_url) . '" alt="Logo">';
                }
                echo '</a>';
            }
        }
        ?>

        <div class="footer-info">
            <?php
            // Boucle pour les colonnes de contenu
            for ($i = 1; $i <= 2; $i++) {
                $footer_column_title = get_theme_mod("footer_title_$i", '');
                $footer_column_content = get_theme_mod("footer_content_$i", '');

                if (!empty($footer_column_title) && !empty($footer_column_content)) {
                    echo '<div class="column">';
                    echo '<h6>' . esc_html($footer_column_title) . '</h6>';
                    echo '<div>' . wpautop(esc_html($footer_column_content)) . '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>

    <div class="row">
        <?php
        // Vérification et affichage du copyright
        $footer_copyright = get_theme_mod('footer_copyright', '');
        if (!empty($footer_copyright)) {
            echo '<p>' . esc_html($footer_copyright) . '</p>';
        }
        ?>

        <div class="social-icons">
            <?php
            // Boucle pour les icônes sociales
            for ($i = 1; $i <= 2; $i++) {
                $social_icon = get_theme_mod("social_icon_$i", '');
                $social_link = get_theme_mod("social_link_$i", '');

                if (!empty($social_icon) && !empty($social_link)) {
                    echo '<a href="' . esc_url($social_link) . '">';
                    echo '<img src="' . esc_url($social_icon) . '" alt="Social Icon">';
                    echo '</a>';
                }
            }
            ?>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
