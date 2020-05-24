<?php

/**
 * Plugin Name: Page Slug Body Class
 * Plugin URI: https://revele.art
 * Description: Add the page slug to body class
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');
