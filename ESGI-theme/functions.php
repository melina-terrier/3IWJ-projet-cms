<?php

add_action('after_setup_theme', 'esgi_register_nav_menus');
function esgi_register_nav_menus()
{
    register_nav_menus([
        'primary_menu' => __('Menu principal', 'ESGI'),
    ]);
}

add_action('after_setup_theme', 'esgi_theme_setup');
function esgi_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
}

function customizer_sections($wp_customize) {
    /**
     * Section des Partenaires
     */
    $wp_customize->add_section('partners_section', array(
        'title'    => __('Sections des partenaires', 'esgi'),
        'priority' => 30,
    ));

    // Titre de la section des partenaires
    $wp_customize->add_setting('partners_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('partners_title', array(
        'type'        => 'text',
        'section'     => 'partners_section',
        'label'       => __('Titre de la section', 'esgi'),
        'description' => __('Change le titre de la section des partenaires.', 'yourtheme'),
    ));

    // Champs pour les logos des partenaires
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("partner_logo_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "partner_logo_$i", array(
            'label'    => sprintf(__('Logo du partenaire %d', 'yourtheme'), $i),
            'section'  => 'partners_section',
            'settings' => "partner_logo_$i",
        )));
    }

    /**
     * Section des Membres
     */
    $wp_customize->add_section('members_section', array(
        'title'    => __('Section des membres', 'yourtheme'),
        'priority' => 40, // Positionner après la section des partenaires
    ));

    // Titre de la section des membres
    $wp_customize->add_setting('members_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('members_title', array(
        'type'        => 'text',
        'section'     => 'members_section',
        'label'       => __('Titre de la section', 'yourtheme'),
        'description' => __('Change le titre de la section des membres.', 'yourtheme'),
    ));

    // Champs pour les images des membres
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("member_image_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "member_image_$i", array(
            'label'    => sprintf(__('Photo du membre %d', 'yourtheme'), $i),
            'section'  => 'members_section',
            'settings' => "member_image_$i",
        )));

        $wp_customize->add_setting("member_job_$i", array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("member_job_$i", array(
            'type'     => 'text',
            'label'    => sprintf(__('Post du membre %d', 'esgi'), $i),
            'section'  => 'members_section',
            'settings' => "member_job_$i",
        ));

        $wp_customize->add_setting("member_info_$i", array(
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("member_info_$i", array(
            'type'     => 'textarea',
            'label'    => sprintf(__('Info du membre %d', 'esgi'), $i),
            'section'  => 'members_section',
            'settings' => "member_info_$i",
        ));
    }

    /**
     * Section a propos
     */
    $wp_customize->add_section('about_section', array(
        'title'    => __('Section à propos', 'esgi'),
        'priority' => 50,
    ));

    $wp_customize->add_setting("about_image", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "about_image", array(
        'label'    => __('Photo de la section à propos', 'esgi'),
        'section'  => 'about_section',
        'settings' => "about_image",
    )));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("about_title_$i", array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("about_title_$i", array(
            'type'     => 'text',
            'label'    => sprintf(__('Titre %d', 'esgi'), $i),
            'section'  => 'about_section',
            'settings' => "about_title_$i",
        ));

        $wp_customize->add_setting("about_text_$i", array(
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("about_text_$i", array(
            'type'     => 'textarea',
            'label'    => sprintf(__('Contenu %d', 'esgi'), $i),
            'section'  => 'about_section',
            'settings' => "about_text_$i",
        ));
    }

    /**
     * Section des services
     */
    $wp_customize->add_section('services_section', array(
        'title'    => __('Section des services', 'esgi'),
        'priority' => 60,
    ));

    // Titre de la section des membres
    $wp_customize->add_setting('services_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('services_title', array(
        'type'        => 'text',
        'section'     => 'services_section',
        'label'       => __('Titre de la section', 'esgi'),
        'description' => __('Change le titre de la section des services.', 'yourtheme'),
    ));

    // Champs pour les images des membres
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("service_image_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service_image_$i", array(
            'label'    => sprintf(__('Photo du service %d', 'esgi'), $i),
            'section'  => 'services_section',
            'settings' => "service_image_$i",
        )));
    }
}
add_action('customize_register', 'customizer_sections');


add_action('widgets_init', 'esgi_widget_init');
function esgi_widget_init()
{
    register_sidebar([
        'name'          => 'Barre latérale',
        'id'            => 'sidebar-1',
        'description'   => 'Zone de widgets présente dans la barre latérale des articles',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ]);
}


function esgi_comment_callback($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <div class="comment-author">
                <strong><?php echo get_comment_author(); ?></strong>
            </div>
            <div class="comment-text">
                <?php comment_text(); ?>
            </div>
            <div class="reply-link">
                <?php
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply', 'yourtheme'),
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                )));
                ?>
            </div>
        </div>
    </li>
    <?php
}


add_action('wp_enqueue_scripts', 'esgi_theme_assets');
function esgi_theme_assets()
{

    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js');

    // Injection de variable dans le javascript
    $big = 999999999; // need an unlikely integer
    $values = [
        'ajaxURL' => admin_url('admin-ajax.php'),
        'base' => esc_url(get_pagenum_link($big))
    ];
    wp_localize_script('main', 'esgiValues', $values);
}

add_action('wp_ajax_loadPosts', 'ajax_load_posts');
add_action('wp_ajax_nopriv_loadPosts', 'ajax_load_posts');

add_filter('paginate_links', 'esgi_paginate_links');
function esgi_paginate_links($link)
{
    return remove_query_arg(['action', 'page', 'base'], $link);
}
function ajax_load_posts()
{
    //echo $_GET['page'], '-', $_GET['action'];
    $paged = $_GET['page'];
    $base = $_GET['base'];
    // Ouvrir le buffer php
    ob_start();
    // include la liste
    include('template-parts/posts_list.php');
    // rendre le contenu du buffer et le fermer
    echo ob_get_clean();

    wp_die();
}

function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'wpc_mime_types');