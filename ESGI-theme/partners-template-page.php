<?php
/**
 * Template Name: Partners template
 * Description: A custom template for the partners page.
 */

get_header();

echo '<h1>'.get_the_title().'</h1>';
echo '<section class="partners">';
include 'template-parts/partners.php';
echo '</section>';

get_footer();
?>
