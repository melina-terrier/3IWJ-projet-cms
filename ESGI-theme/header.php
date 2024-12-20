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

        <?php the_custom_logo(); ?>

        <img src="/wp-content/uploads/2024/12/menu.svg">

        <div class="menu">
            <p>Or try search</p>
            <span>x</span>
            <?php
            wp_nav_menu([
                'theme_location' => 'primary_menu',
                'container' => 'nav',
            ]);
            ?>  
        </div>

    </header>