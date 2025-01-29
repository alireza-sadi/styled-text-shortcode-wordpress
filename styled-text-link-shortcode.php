<?php
/**
 * Plugin Name: Styled Text Link Shortcode
 * Description: A shortcode plugin to wrap text in a styled div and convert a specific word to a link.
 * Version: 1.1
 * Author: Alireza Sadi
 * Author URI: https://github.com/alireza-sadi
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function styled_text_link_shortcode($atts, $content = null) {
    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'w' => '',   // Word to turn into a link
            'u' => '#',  // URL for the link
        ),
        $atts,
        'stl'
    );

    $link_word = esc_html($atts['w']);
    $link_url = esc_url($atts['u']);
    $content = esc_html($content);

    // Create a link for the specified word
    if (!empty($link_word)) {
        $content = str_replace(
            $link_word,
            '<a href="' . $link_url . '" style="color: #120457; text-decoration: none; font-weight:600">' . $link_word . '</a>',
            $content
        );
    }

    // Return the styled div with the modified content
    return '<div style="background-color: #f9f9f9; padding: 15px; border: 1px solid #ccc; border-radius: 5px;">' . $content . '</div>';
}

// Register the shortcode
add_shortcode('stl', 'styled_text_link_shortcode');
