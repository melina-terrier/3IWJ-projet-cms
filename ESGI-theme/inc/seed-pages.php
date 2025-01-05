<?php
function setup_theme_defaults() {
    // Suppression des avertissements pour éviter "Headers already sent"
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
    }

    // Helper function to handle image uploads
    function upload_image($image_path, $post_id) {
        if (file_exists($image_path)) {
            $upload_dir = wp_upload_dir();
            $image_data = file_get_contents($image_path);
            $filename = basename($image_path);
            $file_path = $upload_dir['path'] . '/' . $filename;

            file_put_contents($file_path, $image_data);

            $wp_filetype = wp_check_filetype($filename, null);
            $attachment = [
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];

            $attach_id = wp_insert_attachment($attachment, $file_path, $post_id);

            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attach_id, $file_path);
            wp_update_attachment_metadata($attach_id, $attach_data);

            set_post_thumbnail($post_id, $attach_id);
        }
    }

    // Set default theme mods if they don't exist
    $default_theme_mods = array(
        // About section defaults
        'about_image' => get_template_directory_uri() . '/assets/images/about-image.png',
        'about_title_1' => 'Who are we?',
        'about_text_1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'about_title_2' => 'Our vision',
        'about_text_2' => 'Nullam faucibus interdum massa. Duis eget leo mattis.',
        'about_title_3' => 'Our mission',
        'about_text_3' => 'Vivamus et viverra neque, ut pharetra ipsum.',

        // Partners section defaults
        'partners_title' => 'Our Partners',
        'partner_logo_1' => get_template_directory_uri() . '/assets/images/partner-1.svg',
        'partner_logo_2' => get_template_directory_uri() . '/assets/images/partner-2.svg',
        'partner_logo_3' => get_template_directory_uri() . '/assets/images/partner-3.svg',
        'partner_logo_4' => get_template_directory_uri() . '/assets/images/partner-4.svg',
        'partner_logo_5' => get_template_directory_uri() . '/assets/images/partner-5.svg',
        'partner_logo_6' => get_template_directory_uri() . '/assets/images/partner-6.svg',

        // Services section defaults
        'service_description' => 'Private parties',
        'service_image_1' => get_template_directory_uri() . '/assets/images/service-1.png',
        'service_image_2' => get_template_directory_uri() . '/assets/images/service-2.png',
        'service_image_3' => get_template_directory_uri() . '/assets/images/service-3.png',

        // Contact section defaults
        'contact_title_1' => 'Location',
        'contact_content_1' => '242 Rue du Faubourg Saint-Antoine
75020 Paris FRANCE',
        'contact_title_2' => 'Manager',
        'contact_content_2' => '+33 1 53 31 25 23
info@company.com',
        'contact_title_3' => 'CEO',
        'contact_content_3' => '+33 1 53 31 25 25
ceo@company.com',
        'contact_image' => get_template_directory_uri() . '/assets/images/contact-image.png',

        // Colors
        'primary_color' => '#050A3A',
        'secondary_color' => '#8A8A8A',
        'gradient_color_1' => '#FF4FC0',
        'gradient_color_2' => '#FFD0A8'
    );

    foreach ($default_theme_mods as $key => $value) {
        if (get_theme_mod($key) === false) {
            set_theme_mod($key, $value);
        }
    }

    // Rest of your existing setup code...
    $pages = [
        [
            'title'       => 'A really professional structure for all your events!',
            'content'     => '<h2>About Us</h2>Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.',
            'template'    => 'about-page-template.php',
            'featured_image' => 'assets/images/home.png',
        ],
        [
            'title'       => 'About Us',
            'content'     => "<h2>Sky's the limit</h2>Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.",
            'template'    => 'about-us-page-template.php',
            'featured_image' => 'assets/images/about.png',
        ],
        [
            'title'       => 'Our Services',
            'content'     => '<h2>Corp. Parties</h2>Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.',
            'template'    => 'services-page-template.php',
            'featured_image' => 'assets/images/service.png',
        ],
        [
            'title'       => 'Our Partners',
            'content'     => '',
            'template'    => 'partners-template-page.php',
        ],
        [
            'title'       => 'Search',
            'content'     => '',
            'template'    => 'page-search-form.php',
        ],
        [
            'title'       => 'Contacts',
            'content'     => 'A desire for a big big party or a very select congress? Contact us.
        [contact_info]
        [my_contact_form]',
        ],
        [
            'title'       => 'Blog',
        ],
    ];

    $home_page_id = null;
    $blog_page_id = null;

    foreach ($pages as $page) {
        // Vérifiez si une page avec le même titre existe
        $query = new WP_Query([
            'post_type'  => 'page',
            'title'      => $page['title'],
            'post_status' => 'publish',
        ]);

        if (!$query->have_posts()) {
            $page_id = wp_insert_post([
                'post_title'   => $page['title'],
                'post_content' => $page['content'] ?? '',
                'post_status'  => 'publish',
                'post_type'    => 'page',
            ]);

            if (!empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }

            if (!empty($page['featured_image'])) {
                $image_path = get_template_directory() . '/' . $page['featured_image'];
                upload_image($image_path, $page_id);
            }

            if ($page['title'] === 'A really professional structure for all your events!') {
                $home_page_id = $page_id;
            } elseif ($page['title'] === 'Blog') {
                $blog_page_id = $page_id;
            }
        }

        wp_reset_postdata();
    }

    if ($home_page_id && $blog_page_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page_id);
        update_option('page_for_posts', $blog_page_id);
    }

    // Création du menu principal
    $menu_name = 'Main Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        $menu_items = [
            ['title' => 'Home', 'url' => home_url('/')],
            ['title' => 'About Us', 'url' => home_url('/about-us/')],
            ['title' => 'Services', 'url' => home_url('/our-services/')],
            ['title' => 'Partners', 'url' => home_url('/our-partners/')],
            ['title' => 'Blog', 'url' => home_url('/blog/')],
            ['title' => 'Contacts', 'url' => home_url('/contacts/')],
        ];

        foreach ($menu_items as $item) {
            wp_update_nav_menu_item($menu_id, 0, [
                'menu-item-title'  => $item['title'],
                'menu-item-url'    => $item['url'],
                'menu-item-status' => 'publish',
                'menu-item-type'   => 'custom',
            ]);
        }

        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    // Création des posts 'members' avec images
    $members = [
        [
            'title' => 'Sales Manager',
            'content' => '+33 1 53 31 25 23 sales@company.com',
            'featured_image' => 'assets/images/sales_manager.png',
        ],
        [
            'title' => 'Event Planner',
            'content' => '+33 1 53 31 25 24 plan@company.com',
            'featured_image' => 'assets/images/service.png',
        ],
        [
            'title' => 'Designer',
            'content' => '+33 1 53 31 25 20 design@company.com',
            'featured_image' => 'assets/images/designer.png',
        ],
        [
            'title' => 'CEO',
            'content' => '+33 1 53 31 25 25 ceo@company.com',
            'featured_image' => 'assets/images/ceo.png',
        ],
    ];

    foreach ($members as $member) {
        // Check if member already exists
        $existing_member = get_page_by_title($member['title'], OBJECT, 'members');

        if (!$existing_member) {
            $post_id = wp_insert_post([
                'post_title'   => $member['title'],
                'post_content' => $member['content'],
                'post_status'  => 'publish',
                'post_type'    => 'members',
            ]);

            if (!empty($member['featured_image'])) {
                $image_path = get_template_directory() . '/' . $member['featured_image'];
                if (file_exists($image_path)) {
                    upload_image($image_path, $post_id);
                }
            }
        }
    }

    // Création du post par défaut
    $default_post = [
        'post_title'   => 'Mauris venenatis fermentum pellentesque.',
        'post_content' => 'Nunc sed imperdiet nisl, quis auctor nisi. Phasellus at sollicitudin nisl...',
        'post_status'  => 'publish',
        'post_type'    => 'post',
        'post_excerpt' => 'Nullam eget leo in libero malesuada dapibus in at felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 
        'tags_input' => ['Web', 'Twitter', 'App'],
    ];

    if (!get_page_by_title($default_post['post_title'], OBJECT, 'post')) {
        $post_id = wp_insert_post($default_post);

        // Ajouter une image par défaut si nécessaire
        $default_image_path = get_template_directory() . '/assets/images/service.png';
        if (file_exists($default_image_path)) {
            upload_image($default_image_path, $post_id);
        }
    }
}

add_action('after_switch_theme', 'setup_theme_defaults');
?>