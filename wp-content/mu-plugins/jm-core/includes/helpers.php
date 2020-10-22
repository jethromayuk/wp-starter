<?php
/**
 * Helper functions used for simplifying methods inside the plugin.
 *
 * @category Helpers
 * @package  JM_CORE
 * @author   Jethro May <hello@jethromay.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://jethromay.com/
 */

/**
 * Helper method to check if a file exists. If it does, include it.
 *
 * @param $file - Include the file.
 *
 * @return void
 */
function jm_include($file)
{
    $path = jm_get_path($file);

    if(file_exists($path)) :

        include_once $path;

    endif;
}

/**
 * Helper method to return the path.
 *
 * @param string $path - Pass through the path.
 *
 * @return void
 */
function jm_get_path($path = '')
{
    return JM_PATH . $path;
}

/**
 * Helper method to singularize a word.
 *
 * @param $word - Pass through the word.
 *
 * @return string|string[]
 */
function jm_singularize($word)
{
    return Inflect::singularize($word);
}

/**
 * Helper method to pluralize a word.
 *
 * @param $word - Pass through the word.
 *
 * @return string|string[]
 */
function jm_pluralize($word)
{
    $word = ucwords(str_replace('-', ' ', $word));
    return Inflect::pluralize($word);
}
