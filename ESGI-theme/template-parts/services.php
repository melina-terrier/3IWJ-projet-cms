<?php
echo '<section class="services">';
if(is_front_page()){
    echo '<h2>Our Services</h2>';
}
echo '<div class="services-container">';
$service_description = get_theme_mod('service_description', '');
for ($i = 1; $i <= 2; $i++) {
    $service_image = get_theme_mod("service_image_$i", '');
    if (!empty($service_image)) {
        echo '<img src="'.$service_image.'" alt="'.$service_description.'" class="service-image">';
    }
}
if (!empty($service_description)) {
    echo '<h4>'.$service_description.'</h4>';
}
$service_image = get_theme_mod("service_image_3", '');
if (!empty($service_image)) {
    echo '<img src="'.$service_image.'" alt="'.$service_description.'" class="service-image">';
}
echo '</div>';
echo '</section>';
?>