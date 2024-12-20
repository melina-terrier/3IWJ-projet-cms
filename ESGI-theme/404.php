<?php
get_header();
?>

<div class="dark">
    <h1>404 Error.</h1>
    <p>The page you were looking for couldn't be found.</p>
    <p>Maybe try a search?</p>
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" name="s" placeholder="Type something to search" >
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
