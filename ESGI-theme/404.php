<?php
get_header();
?>

<div class="page-container wrapper">
    <h1>404 Error.</h1>
    <div class="text">
        <p>The page you were looking for couldn't be found.</p>
        <p>Maybe try a search?</p>
    </div>
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
        <input type="search" name="s" placeholder="Type something to search..." >
        <button type="submit">
            <span>
                <i class="fa fa-search"></i>
            </span>
        </button>
    </form>
</div>

<?php
get_footer();
?>
