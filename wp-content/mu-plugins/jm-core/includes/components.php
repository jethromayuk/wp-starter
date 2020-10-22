<?php
/**
 * Component related helper functions.
 *
 * @category Helpers
 * @package  JM_CORE
 * @author   Jethro May <hello@jethromay.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://jethromay.com/
 */

/**
 * Adds a helper function to retrieve a component by a slug. get_component('header/header');
 *
 * @param $slug   - The slug of the component.
 * @param array $params - An array of data passed to component.
 * @param bool  $output - False stops component being echoed automatically.
 *
 * @return false|string
 */
function get_component($slug, array $params = [], $output = true) {
    $templates = [];
    $name = (string) $slug;

    if ('' !== $name) {
        $templates[] = "components/{$slug}.php";
    }

    $templates[] = "{$slug}.php";

    $template = locate_template($templates, false, false);

    if (!$template) {
        return;
    }

    if ($params) {
        foreach($params as $key => $variable) {
            $$key = $variable;
        }
    }

    include($template);
}
