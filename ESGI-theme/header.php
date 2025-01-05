<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= get_bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class( is_404() || is_page_template('page-search-form.php') ? 'dark' : '' ); ?>>

    <?php wp_body_open(); ?>

    <header id="site-header">

        <div class="header-content">

            <?php 
                $custom_logo_id = get_theme_mod('custom_logo');
                if ($custom_logo_id) {
                    $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if ($logo_image) {
                        echo '<a href="' . esc_url(home_url('/')) . '" class="logo">';
                        $logo_url = $logo_image[0];
                        if (strpos($logo_url, '.svg') !== false) {
                            $svg_content = file_get_contents($logo_url);
                            echo $svg_content;
                        } else {
                            echo '<img src="' . esc_url($logo_url) . '" alt="Logo">';
                        }
                        echo '</a>';
                    }
                }
            ?>
    
            <div class="btn-menu">
                <svg width="40" height="10" viewBox="0 0 40 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="3" fill="white"/>
                <rect x="19" y="7" width="21" height="3" fill="white"/>
                </svg>
            </div>
        
        </div>

        <div class="menu-container">
            
            <a id="search-button" href="/recherche">Or try search</a>

            <?php
            wp_nav_menu([
                'theme_location' => 'primary_menu',
                'container' => 'nav',
            ]);
            ?>  
        </div>

    </header>