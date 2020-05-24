<?php

/**
 * Plugin Name: Hide Core Update
 * Plugin URI: https://revele.art
 * Description: Hide update notifications in backoffice
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function remove_core_updates()
{
    global $wp_version;
    return (object) array('last_checked' => time(), 'version_checked' => $wp_version,);
}
add_filter('pre_site_transient_update_core', 'remove_core_updates', 999);
add_filter('pre_site_transient_update_plugins', 'remove_core_updates', 999);
add_filter('pre_site_transient_update_themes', 'remove_core_updates', 999);
