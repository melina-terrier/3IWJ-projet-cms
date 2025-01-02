
<footer id="site-footer">

    <div class="row">

        <?php 
        $logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]; 
        if (strpos($logo_url, '.svg') !== false) {
            $svg_content = file_get_contents($logo_url);
            echo $svg_content;
        } else {
            echo '<img src="' . esc_url($logo_url) . '" alt="Logo">';
        }
        ?>

        <div class="footer-info">

            <?php
            for($i=1; $i<=2; $i++){
                $footer_column_title = get_theme_mod("footer_title_$i", '');
                $footer_column_content = get_theme_mod("footer_content_$i", '');
                echo '<div class="column">';
                echo '<h6>'.$footer_column_title.'</h6>';
                echo '<p>'.wpautop($footer_column_content).'</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="row">
        <p><?php echo get_theme_mod('footer_copyright')?></p>
        <div class="social-icons">
            <?php 
            for($i=1; $i<=2; $i++){
                $social_icon = get_theme_mod("social_icon_$i", '');
                $social_link = get_theme_mod("social_link_$i", '');
                echo '<a href="'.$social_link.'"><img src="'.$social_icon.'"></a>';
            }
            ?>
        </div>
    </div>   
    
</footer>

<?php wp_footer();
?>
</body>

</html>