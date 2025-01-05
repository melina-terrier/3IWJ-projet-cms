<?php
/**
 * Template Name: Partners template
 * Description: A custom template for the partners page.
 */

get_header();

echo '<div class="page-container template wrapper">';
echo '<h1>'.get_the_title().'</h1>';
echo '<section class="partners">';
include 'template-parts/partners.php';
echo '</section>';
echo '</div>';

get_footer();
?>
