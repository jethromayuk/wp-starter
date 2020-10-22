<?php

add_action('wp_enqueue_scripts', 'jm_image_scripts');
function jm_image_scripts()
{
  wp_enqueue_script('jm_images', plugins_url('assets/lazysizes.min.js', dirname(__FILE__)), [], '5.2.2', true);
}

//------------------------------------------------------------------------------
add_filter('max_srcset_image_width', 'jm_max_srcset_image_width', 10, 2);

function jm_max_srcset_image_width($max_width, $size_array)
{
    return 1920; //thats the largest image size we support
}
