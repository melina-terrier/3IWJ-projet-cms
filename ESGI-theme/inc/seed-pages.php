<?php
/**
 * Seed pages creation for ESGI Theme
 */

function esgi_create_seed_pages() {
    // Only run this once
    if (get_option('esgi_seed_pages_created')) {
        return;
    }

    // Array of pages to create
    $pages = array(
        'Home' => array(
            'content' => '<!-- wp:paragraph -->
<p>Welcome to our website. We are a creative agency dedicated to bringing your ideas to life.</p>
<!-- /wp:paragraph -->',
            'template' => '',
            'is_front' => true
        ),
        'About Us' => array(
            'content' => '<!-- wp:paragraph -->
<p>Learn more about our team and our mission to deliver exceptional digital experiences.</p>
<!-- /wp:paragraph -->',
            'template' => 'about-us-page-template.php'
        ),
        'Services' => array(
            'content' => '<!-- wp:paragraph -->
<p>Discover our comprehensive range of digital services designed to help your business grow.</p>
<!-- /wp:paragraph -->',
            'template' => 'services-page-template.php'
        ),
        'Partners' => array(
            'content' => '<!-- wp:paragraph -->
<p>Meet our trusted partners who help us deliver outstanding results.</p>
<!-- /wp:paragraph -->',
            'template' => 'partners-template-page.php'
        ),
        'Contact' => array(
            'content' => '<!-- wp:shortcode -->
[my_contact_form]
<!-- /wp:shortcode -->

<!-- wp:shortcode -->
[contact_info]
<!-- /wp:shortcode -->',
            'template' => ''
        ),
        'Blog' => array(
            'content' => '',
            'template' => '',
            'post_type' => 'page'
        ),
        'Search' => array(
            'content' => '',
            'template' => 'page-search-form.php',
            'post_name' => 'recherche'
        )
    );

    // Create each page
    foreach ($pages as $title => $page_data) {
        $page_check = get_page_by_title($title);

        if (!$page_check) {
            $args = array(
                'post_type' => 'page',
                'post_title' => $title,
                'post_status' => 'publish',
                'post_content' => $page_data['content']
            );

            // Set post name if specified
            if (isset($page_data['post_name'])) {
                $args['post_name'] = $page_data['post_name'];
            }

            // Insert the page
            $page_id = wp_insert_post($args);

            // Set page template if specified
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }

            // Set as front page if specified
            if (isset($page_data['is_front']) && $page_data['is_front']) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page_id);
            }

            // Set the blog page
            if ($title === 'Blog') {
                update_option('page_for_posts', $page_id);
            }
        }
    }

    // Create sample team members
    $team_members = array(
        'John Doe' => array(
            'content' => 'Creative Director with over 10 years of experience in digital design.',
            'position' => 'Creative Director'
        ),
        'Jane Smith' => array(
            'content' => 'Lead Developer specializing in front-end technologies and user experience.',
            'position' => 'Lead Developer'
        ),
        'Mike Johnson' => array(
            'content' => 'Marketing Strategist helping businesses grow their digital presence.',
            'position' => 'Marketing Strategist'
        ),
        'Sarah Williams' => array(
            'content' => 'UI/UX Designer creating beautiful and functional digital experiences.',
            'position' => 'UI/UX Designer'
        )
    );

    foreach ($team_members as $name => $member_data) {
        $member_check = get_page_by_title($name, OBJECT, 'members');

        if (!$member_check) {
            wp_insert_post(array(
                'post_type' => 'members',
                'post_title' => $name,
                'post_content' => $member_data['content'],
                'post_status' => 'publish'
            ));
        }
    }

    // Create sample blog posts
    $posts = array(
        'Welcome to Our New Website' => 'We are excited to announce the launch of our new website! Stay tuned for regular updates about our projects and insights.',
        'The Future of Web Design' => 'Explore the latest trends in web design and how they are shaping the digital landscape.',
        'Why User Experience Matters' => 'Learn why user experience is crucial for the success of your digital products and how to improve it.'
    );

    foreach ($posts as $title => $content) {
        $post_check = get_page_by_title($title, OBJECT, 'post');

        if (!$post_check) {
            wp_insert_post(array(
                'post_type' => 'post',
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish'
            ));
        }
    }

    // Mark as done
    update_option('esgi_seed_pages_created', true);
}

// Hook into theme activation
add_action('after_switch_theme', 'esgi_create_seed_pages');