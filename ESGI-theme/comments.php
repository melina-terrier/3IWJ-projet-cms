<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(__('Comments (%s)', 'esgi'), $comments_number);
            ?>
        </h4>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ul',
                'short_ping' => true,
                'callback'   => 'esgi_comment_callback', // Utilisation d'une fonction personnalisée
            ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'esgi'); ?></p>
    <?php endif; ?>

    <div id="respond" class="comment-respond">
    <h4 class="reply-title"><?php _e('Leave a Reply', 'esgi'); ?></h4>
    <?php
    comment_form(array(
        'fields' => array(
            'author' => '<p class="comment-form-author"><label for="author">' . __('Full Name', 'esgi') . '</label>' .
                '<input id="author" name="author" type="text" value="" size="30" /></p>',
        ),
        'comment_field' => '<p class="comment-form-comment">
            <label for="comment">' . __('Message', 'esgi') . '</label>' .
            '<textarea id="comment" name="comment" rows="5" required></textarea></p>',
        'title_reply' => '',
        'label_submit' => __('Submit', 'esgi'),
        'logged_in_as' => '<p class="logged-in-as">' . 
            sprintf(
                __('You are logged in as %1$s. <a href="%2$s">Log out?</a>', 'esgi'),
                '<a href="' . esc_url(get_edit_user_link()) . '">' . $user_identity . '</a>',
                esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink())))
            ) . '</p>',
    ));
    ?>
</div>
</div>
