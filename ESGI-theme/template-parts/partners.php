<?php
echo '<section class="partners">';
if(is_front_page()){
    $partner_title = get_theme_mod('partners_title', '');
    if($partner_title){
        echo '<h2>'.$partner_title.'</h2>';
    }
}
echo '<div class="partners-container">';
for ($i = 1; $i <= 6; $i++) {
    $partner_image = get_theme_mod("partner_logo_$i", '');

    if (!empty($partner_image)) {
        echo '<img src="'.$partner_image.'" alt="Our Partners" class="partner-image">';
    }
}
echo '</div></section>';
?>