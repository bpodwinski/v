<?php

/**
 * Plugin Name: humans.txt
 * Plugin URI: https://revele.art
 * Description: Add humans.txt Tag
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function humanstxt()
{
?>
    <link type="text/plain" rel="author" href="<?php echo get_site_url(null, '/humans.txt'); ?>" />
<?php
}
add_action('wp_head', 'humanstxt', 1);
