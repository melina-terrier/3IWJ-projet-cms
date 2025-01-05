<?php

// Ajout du menu
add_action('after_setup_theme', 'esgi_register_nav_menus');
function esgi_register_nav_menus()
{
    register_nav_menus([
        'primary_menu' => __('Menu principal', 'ESGI'),
    ]);
}

// Mise en place du setup du thème
add_action('after_setup_theme', 'esgi_theme_setup');
function esgi_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
}


// Ajout des éléments dans le customizer
function customizer_sections($wp_customize) {

    /**
     * Section des Partenaires
     */
    $wp_customize->add_section('partners_section', array(
        'title'    => __('Sections des partenaires', 'esgi'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('partners_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('partners_title', array(
        'type'        => 'text',
        'section'     => 'partners_section',
        'label'       => __('Titre de la section', 'esgi'),
        'description' => __('Change le titre de la section des partenaires.', 'esgi'),
    ));

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("partner_logo_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "partner_logo_$i", array(
            'label'    => sprintf(__('Logo du partenaire %d', 'esgi'), $i),
            'section'  => 'partners_section',
            'settings' => "partner_logo_$i",
        )));
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

    $wp_customize->add_setting('services_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('services_title', array(
        'type'        => 'text',
        'section'     => 'services_section',
        'label'       => __('Titre de la section', 'esgi'),
        'description' => __('Change le titre de la section des services.', 'esgi'),
    ));

    $wp_customize->add_setting('service_description', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('service_description', array(
        'type'        => 'text',
        'section'     => 'services_section',
        'label'       => __('Titre du service', 'esgi'),
        'description' => __('Change le titre du service.', 'esgi'),
    ));

    for ($i = 1; $i <= 3; $i++) {
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


    /**
     * Section contact
     */
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Section de contact', 'esgi'),
        'priority' => 80,
    ));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("contact_title_$i", array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("contact_title_$i", array(
            'type'        => 'text',
            'section'     => 'contact_info',
            'label'       => __('Titre de contact', 'esgi'),
            'description' => __('Change le titre du paragraphe de contact.', 'esgi'),
        ));

        $wp_customize->add_setting("contact_content_$i", array(
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("contact_content_$i", array(
            'type'        => 'textarea',
            'section'     => 'contact_info',
            'label'       => __('Contenu du paragraphe de contact', 'esgi'),
            'description' => __('Change le contenu du paragraphe de contact.', 'esgi'),
        ));
    }
    $wp_customize->add_setting("contact_image", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "about_image", array(
        'label'    => __('Photo de la section contact', 'esgi'),
        'section'  => 'contact_info',
        'settings' => "contact_image",
    )));


    /**
     * Section footer
     */
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Section du footer', 'esgi'),
        'priority' => 80,
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_copyright', array(
        'type'        => 'text',
        'section'     => 'footer_section',
        'label'       => __('Copyright', 'esgi'),
    ));

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("footer_title_$i", array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("footer_title_$i", array(
            'type'        => 'text',
            'section'     => 'footer_section',
            'label'       => __('Titre', 'esgi'),
        ));

        $wp_customize->add_setting("footer_content_$i", array(
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("footer_content_$i", array(
            'type'        => 'textarea',
            'section'     => 'footer_section',
            'label'       => __('Contenu du paragraphe', 'esgi'),
        ));
    }


    /**
     * Icones réseaux sociaux
     */
    $wp_customize->add_section('social_icons', array(
        'title'    => __('Icones réseaux sociaux', 'esgi'),
        'priority' => 80,
    ));

    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("social_icon_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "social_icon_$i", array(
            'label'       => __("Icone du réseau social $i", 'esgi'),
            'section'  => 'social_icons',
            'settings' => "social_icon_$i",
        )));

        $wp_customize->add_setting("social_link_$i", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("social_link_$i", array(
            'type'        => 'text',
            'section'     => 'social_icons',
            'label'       => __("Lien du réseau social $i", 'esgi'),
        ));
    }


    /**
     * Section Couleurs
     */
    $wp_customize->add_section('colors_section', array(
        'title'    => __('Couleurs', 'esgi'),
        'priority' => 20,
    ));

    // Définir la couleur primaire
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#007BFF', // Bleu par défaut
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Couleur primaire', 'esgi'),
        'section'  => 'colors_section',
        'settings' => 'primary_color',
    )));

    // Définir la couleur secondaire
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#6C757D', // Gris par défaut
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Couleur secondaire', 'esgi'),
        'section'  => 'colors_section',
        'settings' => 'secondary_color',
    )));

    // Définir les couleurs pour les dégradés
    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("gradient_color_$i", array(
            'default'           => $i === 1 ? '#ff7f50' : '#ff4500', // Couleurs par défaut pour le dégradé
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "gradient_color_$i", array(
            'label'    => sprintf(__('Couleur dégradé %d', 'esgi'), $i),
            'section'  => 'colors_section',
            'settings' => "gradient_color_$i",
        )));
    }

}
add_action('customize_register', 'customizer_sections');


// Ajout de la barre latérale
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

// Affichage des commentaires
function esgi_comment_callback($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" class="comment-body">
        <h5 class="comment-author">
            <?php echo get_comment_author(); ?>
        </h5>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
        <div class="reply-link">
        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.259652 4.93237L5.75978 0.182841C6.24122 -0.23294 7 0.104591 7 0.750466V3.25212C12.0197 3.30959 16 4.31562 16 9.07268C16 10.9927 14.7631 12.8948 13.3958 13.8893C12.9692 14.1997 12.3611 13.8102 12.5184 13.3071C13.9354 8.77547 11.8463 7.5724 7 7.50265V10.25C7 10.8969 6.24062 11.2329 5.75978 10.8176L0.259652 6.06762C-0.0863164 5.76881 -0.0867851 5.23159 0.259652 4.93237Z" fill="#050A3A"/>
        </svg>
            <?php
            comment_reply_link(array_merge($args, array(
                'reply_text' => __('Reply', 'esgi'),
                'depth'      => $depth,
                'max_depth'  => $args['max_depth'],
            )));
            ?>
        </div>
    </li>
    <?php
}


// Pagination des articles
add_action('wp_enqueue_scripts', 'esgi_theme_assets');
function esgi_theme_assets()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js');
    $big = 999999999;
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
    $paged = $_GET['page'];
    $base = $_GET['base'];
    ob_start();
    include('template-parts/posts_list.php');
    echo ob_get_clean();
    wp_die();
}


// Prise en charge des images SVG
function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');


// Ajout de l'extrait pour les posts
function enable_post_excerpts() {
    add_post_type_support('post', 'excerpt');
}
add_action('init', 'enable_post_excerpts');


// Ajout d'un post type pour les membres
add_action('init', 'register_custom_post_type');
function register_custom_post_type(){
    $member_labels = array(
        'name' => 'Membres',
        'singular_name' => 'Membre',
        'menu_name' => 'Membres',
        'name_admin_bar' => 'Membre',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter un membre',
        'new_item' => 'Nouveau membre',
        'edit_item' => 'Modifier un membre',
        'view_item' => 'Voir le membre',
        'all_items' => 'Tous les membres',
        'search_items' => 'Rechercher parmi les membres',
        'not_found' => 'Aucun membre trouvé',
    );

    $args = array(
        'labels' => $member_labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'members'),
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'exclude_from_search' => true,
    );

    register_post_type('members', $args);
}


// Shortcode pour le formulaire de contact
function my_contact_form_shortcode() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['my_contact_form'])) {
        $email   = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        
        if (!empty($email) && !empty($message)) {
            $to      = get_option('admin_email'); 
            $subject = __('New Contact Form Submission', 'esgi');
            $headers = ['Content-Type: text/html; charset=UTF-8', 'From: ' . $email . ' <' . $email . '>'];
            
            $body = "
                <p><strong>Email:</strong> $email</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            ";
            
            wp_mail('melina.terrier@gmail.com', $subject, $body, $headers);
            
            $response = '<p class="contact-form-success">' . __('Thank you for your message!', 'esgi') . '</p>';
        } else {
            $response = '<p class="contact-form-error">' . __('Please fill in all the fields.', 'esgi') . '</p>';
        }
    }

    ob_start();
    ?>
    <div class="contact-form-container">
        <h2>Write us here</h2>
        <p>Go! Don't be shy.</p>
        <form method="post" class="contact-form">
            <?php if (isset($response)) echo $response; ?>
                <input type="text" name="subject" id="subject" placeholder="Subject" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="tel" name="phone" id="phone" placeholder="Phone no." required>
                <div class="textarea-container">
                    <textarea name="message" id="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <button type="submit" name="my_contact_form">Submit</button>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('my_contact_form', 'my_contact_form_shortcode');


// Ajout des couleurs dans le style
function add_dynamic_styles_to_head() {
    $custom_colors = [];
    for ($i = 1; $i <= 2; $i++) {
        $custom_colors[] = get_theme_mod("gradient_color_$i", '#ffffff');
    }

    $primary_color = get_theme_mod('primary_color', '#007BFF');
    $secondary_color = get_theme_mod('secondary_color', '#6C757D');

    echo '<style>
        :root {
            --primary-color: ' . esc_attr($primary_color) . ';
            --secondary-color: ' . esc_attr($secondary_color) . ';
            --gradient-color-1: ' . esc_attr($custom_colors[0]) . ';
            --gradient-color-2: ' . esc_attr($custom_colors[1]) . ';
        }
    </style>';
}
add_action('wp_head', 'add_dynamic_styles_to_head');


function esgi_contact_section_shortcode() {
    // Récupère les données depuis le Customizer
    $columns = [];
    for ($i = 1; $i <= 3; $i++) {
        $title = get_theme_mod("contact_title_$i", '');
        $content = get_theme_mod("contact_content_$i", '');
        if (!empty($title) || !empty($content)) {
            $columns[] = [
                'title'   => $title,
                'content' => $content,
            ];
        }
    }
    $image_url = get_theme_mod("contact_image", '');

    // Construction du HTML des colonnes
    $output = '<div class="esgi-contact-columns">';
    foreach ($columns as $column) {
        $output .= '<div class="contact-column">';
        if (!empty($column['title'])) {
            $output .= '<h5>' . esc_html($column['title']) . '</h5>';
        }
        if (!empty($column['content'])) {
            $output .= wpautop(esc_html($column['content']));
        }
        $output .= '</div>';
    }
    $output .= '</div>';

    // Ajout de l'image en dessous des colonnes
    if (!empty($image_url)) {
        $output .= '<div class="esgi-contact-image">';
        $output .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr__('Image de contact', 'esgi') . '">';
        $output .= '</div>';
    }

    return $output;
}
add_shortcode('contact_info', 'esgi_contact_section_shortcode');
