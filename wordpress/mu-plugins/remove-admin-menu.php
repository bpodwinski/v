<?php

/**
 * Plugin Name: Remove Admin Menu
 * Plugin URI: https://revele.art
 * Description: Remove some bloat admin menus
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function remove_menus_for_non_admin()
{
    $user = wp_get_current_user();
    if (!in_array('administrator', (array) $user->roles)) {
        remove_menu_page('tools.php');
        remove_menu_page('vc-welcome');
        remove_submenu_page('index.php', 'smyles-licenses');
    }
}
add_action('admin_menu', 'remove_menus_for_non_admin', 999);

function remove_menus()
{
    remove_menu_page('wc-admin&path=/marketing');
    remove_submenu_page('index.php', 'job-manager-setup');
    remove_submenu_page('index.php', 'resume-manager-setup');
}
add_action('admin_menu', 'remove_menus', 999);
