<?php
echo '<section class="members">';
$member_title = get_theme_mod('members_title', '');
echo '<h2>'.$member_title.'</h2>';
for ($i = 1; $i <= 4; $i++) {
    $member_image = get_theme_mod("member_image_$i", '');
    $member_job = get_theme_mod("member_job_$i", '');
    $member_info = get_theme_mod("member_info_$i", '');

    if (!empty($member_image) && !empty($member_job) && !empty($member_info)) {
        echo '<div class="member">';
        echo '<img src="'.$member_image.'" alt="'.$member_job.'" class="member-image">';
        echo '<h3>'.$member_job.'</h3>';
        echo '<p>'.$member_info.'</p>';
        echo '</div>';
    }
}
echo '</section>';
?>