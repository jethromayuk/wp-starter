<?php
/**
 * JM_CORE.
 *
 * @category Class
 * @package  JM_CORE
 * @author   Jethro May <hello@jethromay.com>
 * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     https://jethromay.com/
 */

if(!defined('ABSPATH')) :
    exit;
endif;

if(!class_exists('JM_CORE')) :

    /**
     * Main plugin class.
     *
     * @category Class
     * @package  JM_CORE
     * @author   Jethro May <hello@jethromay.com>
     * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
     * @link     https://jethromay.com/
     */
    class JM_CORE
    {
        var $version = '1.0';
        var $settings = array();

        /**
         * PN_WP_Helpers constructor.
         */
        function __construct()
        {
            /* Do nothing here */
        }

        /**
         * Setup the initial plugin settings.
         *
         * @return void
         */
        function initialize()
        {
            $version = $this->version;
            $basename = plugin_basename(__FILE__);
            $path = plugin_dir_path(__FILE__);
            $url = plugin_dir_url(__FILE__);
            $slug = dirname($basename);

            // Various settings for the plugin.
            $this->settings = array(
                'name'                  => __('Jethro May Core', 'jm'),
                'version'               => $version,
                'file'                  => __FILE__,
                'basename'              => $basename,
                'path'                  => $path,
                'url'                   => $url,
                'slug'                  => $slug,
                'show_admin'            => true,
                'show_updates'          => true,
                'stripslashes'          => false,
                'capability'            => 'manage_options',
                'uploader'              => 'wp',
                'autoload'              => false,
                'remove_wp_meta_box'    => true
            );

            // Constants
            define('JM',             true);
            define('JM_VERSION',     $version);
            define('JM_PATH',        $path);

            // Classes
            include_once JM_PATH . 'classes/inflect.php';

            // Helpers
            include_once JM_PATH . 'includes/helpers.php';

            // Include components.
            jm_include('includes/components.php');

            // Include cpt/taxonomy helpers.
            jm_include('includes/cpt.php');

            // Include search helpers.
            jm_include('includes/search.php');

            // Include image helpers.
            jm_include('includes/images.php');

            // Fire init method.
            add_action('init',    array($this, 'init'), 5);
        }

        /**
         * Run plugin initialization.
         *
         * @return void
         */
        function init()
        {
            // Check if hook has not been fired.
            if(!did_action('plugins_loaded') ) :
                return;
            endif;

            // Set version of the plugin.
            $version = (int) $this->version;

            do_action('jm/init');
        }
    }

    /**
     * Used to return the PlusNarrative WP Helpers instance.
     *
     * @return JM_CORE
     */
    function JM_CORE()
    {
        // Globals
        global $JM_CORE;

        // Initialize
        if(!isset($JM_CORE) ) :
            $JM_CORE = new JM_CORE();
            $JM_CORE->initialize();
        endif;

        // Return.
        return $JM_CORE;
    }

    // Initialize.
    JM_CORE();

endif; // class_exists check.
