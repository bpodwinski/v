<?php

/**
 * Plugin Name: Google Analytics
 * Plugin URI: https://revele.art
 * Description: Add Google Analytics Tag
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function google_analytics()
{
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132374009-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-132374009-1');
    </script>
<?php
}
add_action('wp_head', 'google_analytics', 1);
