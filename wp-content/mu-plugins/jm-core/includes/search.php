<?php

/* -------------------------------------------------------------------------- */
/* ----- Search & Filtering ------------------------------------------------- */
/* -------------------------------------------------------------------------- */

// Adding the id var so that WP recognizes it
add_filter('query_vars', 'jm_filter_query_vars');
function jm_filter_query_vars($vars)
{
  array_push($vars, 'filter');
  // array_push($vars, 'curated');
  return $vars;
}
