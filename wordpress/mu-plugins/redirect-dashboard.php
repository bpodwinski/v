<?php

/**
 * Plugin Name: Redirect Homepage to Dashboard
 * Plugin URI: https://revele.art
 * Description: Redirect user from homepage to dashboard if logged in
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function redirect_dashboard_if_loggued()
{
    if (is_front_page() && is_user_logged_in()) {
        wp_redirect(site_url('/tableau-de-bord'));
        exit;
    }
}
add_action('template_redirect', 'redirect_dashboard_if_loggued');
