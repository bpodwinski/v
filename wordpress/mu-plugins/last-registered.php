<?php

/**
 * Plugin Name: Last Registered
 * Plugin URI: https://revele.art
 * Description: Display a last registered
 * Version: 1.0
 * Author: Benoit Podwinski
 * Author URI: https://benoitpodwinski.com
 */

function last_registered($param)
{

    extract(
        shortcode_atts(
            array(
                'number' => 5,
                'size' => 80
            ),
            $param
        )
    );

    $users = get_users(
        array(
            'orderby' => 'ID',
            'order' => 'DESC',
            'number' => $number
        )
    );

    $ouput .= '<div class="last-registered number-' . $number . '">';

    foreach ($users as $user) {

        $ouput .= '<li class="user user-' . $user->ID . '">
        <a href="' . bp_core_get_user_domain($user->ID) . '" title="' . $user->display_name . '">';

        $ouput .= bp_core_fetch_avatar(
            array(
                'item_id' => $user->ID,
                'width' => $size,
                'height' => $size,
                'class' => 'avatar',
            )
        );

        $ouput .= '<div class="name">' . $user->display_name . '</div>';

        $ouput .= '</a></li>';
    }

    $ouput .= '</div>';

    return $ouput;
}
add_shortcode('last-registered', 'last_registered');
