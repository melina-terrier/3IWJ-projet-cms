<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= get_bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="site-header">

        <div class="header-content">

            <?php 
            $logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]; 
            if (strpos($logo_url, '.svg') !== false) {
                $svg_content = file_get_contents($logo_url);
                echo $svg_content;
            } else {
                echo '<img src="' . esc_url($logo_url) . '" alt="Logo">';
            }
            ?>
    
            <div class="btn-menu">
                <img src="/wp-content/uploads/2024/12/menu.svg">
            </div>
        
        </div>

        <div class="menu-container">
            
            <p>Or try search</p>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary_menu',
                'container' => 'nav',
            ]);
            ?>  
        </div>

    </header>