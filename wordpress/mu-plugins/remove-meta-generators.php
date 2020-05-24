<?php

/**
 * Plugin Name: Remove All Meta Generators
 * Plugin URI: https://revele.art
 * Description: Remove All Meta Generators
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function remove_meta_generators($html)
{
    $pattern = '/<meta name(.*)=(.*)"generator"(.*)>/i';
    $html = preg_replace($pattern, '', $html);
    return $html;
}

function clean_meta_generators($html)
{
    ob_start('remove_meta_generators');
}
add_action('get_header', 'clean_meta_generators', 999);
add_action('wp_footer', function () {
    ob_end_flush();
}, 999);
