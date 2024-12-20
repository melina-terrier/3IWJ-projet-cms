<?php
echo '<section class="about">
<img src="'.get_theme_mod('about_image','').'" alt="About us" class="about-image">';
for ($i = 1; $i <= 3; $i++) {
    $about_title = get_theme_mod("about_title_$i", '');
    $about_text = get_theme_mod("about_text_$i", '');

    if (!empty($about_title) && !empty($about_text)) {
        echo '<div class="about_content">';
        echo '<h3>'.$about_title.'</h3>';
        echo '<p>'.$about_text.'</p>';
        echo '</div>';
    }
}
echo '</section>';
?>