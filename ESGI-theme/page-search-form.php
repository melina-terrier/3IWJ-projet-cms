<?php
get_header(); ?>

<div class="search-form-container page-container wrapper">
    <h1><?php echo get_the_title() ?></h1>
    <form role="search" method="get" action="<?php echo home_url( '/' ); ?>" class="search-form">
        <input type="search" name="s" id="s" placeholder="Type something to search..."/>
        <button type="submit">
            <span>
                <i class="fa fa-search"></i>
            </span>
        </button>
    </form>
</div>

<?php get_footer(); ?>
