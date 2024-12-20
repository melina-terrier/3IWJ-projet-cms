<?php
echo '<section class="services">';
$service_title = get_theme_mod('services_title', '');
echo '<h2>'.$service_title.'</h2>';
echo '<div class="services-container">';
for ($i = 1; $i <= 4; $i++) {
    $service_image = get_theme_mod("service_image_$i", '');

    if (!empty($service_image)) {
        echo '<img src="'.$service_image.'" alt="'.$service_title.'" class="service-image">';
    }
}
echo '</div></section>';
?>