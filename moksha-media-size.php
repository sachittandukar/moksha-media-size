<?php

/*
Plugin Name: Moksha Media Size
Plugin URI: https://github.com/sachittandukar/moksha-media-size
Description: Simple WordPress plugin to show attachment size in media grid view
Version: 1.0
Author: Sachit Tandukar
Author URI: http://sachittandukar.com
License: MIT
*/

add_filter('manage_media_columns', 'moksha_media_columns');
add_action('manage_media_custom_column', 'moksha_media_custom_column', 10, 2);
function moksha_media_columns($defaults)
{
    $defaults['moksha_image'] = 'Media Size';

    return $defaults;
}

function moksha_media_custom_column($column_name, $id)
{
    if ('moksha_image' == $column_name) {
        echo size_format(filesize(get_attached_file($id)));
    }
}