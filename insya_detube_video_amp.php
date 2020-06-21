<?php

/**
 * Plugin Name: Detube AMP Video
 * Plugin URI: http://insya.com/insya_detube_amp_video
 * Description: AMP Video for Detube Wordpress Theme Plugin
 * Version: 1.0
 * Author: Yasin Kuyu
 * Author URI: http://insya.com
 */

add_filter('the_content', 'insya_detube_amp_video', 0);

function insya_detube_amp_video($content)
{
    
    // require_once( AMP__VENDOR__DIR__ . '/includes/class-amp-post-template.php' ); // this loads everything else

    global $wp_query; 

    $post_id = $wp_query->post->ID;

	$file = get_post_meta($post_id, 'dp_video_file', true);
    $code = get_post_meta($post_id, 'dp_video_code', true);

    if (strpos($content, '<video') !== false) {
        return $content;
    } 

    if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {

        if( $code != ""){

            $content = $code . " " . $content;

        }elseif( $file != ""){

            // todo

        } 
    
    }
     
    return $content ;
}
