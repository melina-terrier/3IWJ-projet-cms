<?php
echo '<div class="partners-container">';
for ($i = 1; $i <= 6; $i++) {
    $partner_image = get_theme_mod("partner_logo_$i", '');

    if (!empty($partner_image)) {
        echo '<img src="'.$partner_image.'" alt="Our Partners" class="partner-image">';
    }
}
echo '</section>';
?>