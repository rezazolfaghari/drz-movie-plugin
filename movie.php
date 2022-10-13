<?php
/**
 *
 * @link              http://www.reposii.ir/movie
 * @since             1.0.0
 * @package           movie
 *
 * @wordpress-plugin
 * Plugin Name:       movie
 * Plugin URI:        http://www.rzolfaghari.ir/movie-plugin
 * Description:       With the help of this plugin, you can suggest movies to your users.
 * Version:           1.0.0
 * Author:            Reza Zolfaghari
 * Author URI:        http://www.rzolfaghari.ir/
 * Text Domain:       textDomain
 * Domain Path:       /languages
 */
define("textDomain", 'drz_movie');
define('pluginVersion', '1.0.0');

/**
 * exist cmb2 plugin check
 */
include_once ABSPATH . 'wp-admin/includes/plugin.php';

if (!is_plugin_active('cmb2/init.php')) {
    include_once('include/cmb/init.php');
}


include_once('include/posttypes.php');
include_once('include/taxonomies.php');
include_once('include/rest-api.php');
include_once('include/metabox.php');
include_once('include/shortcodes.php');



include_once('classes/mainClass.php');
include_once('classes/widgetClass.php');


function pluginEnqueue()
{
    //Style
    wp_enqueue_style('bootstrap',  plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css', array(), pluginVersion);
    wp_enqueue_style('drz-style',  plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), pluginVersion);
    //Script
    wp_enqueue_script('bootstrap',  plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.min.js', array(), pluginVersion, true);
}

add_action('wp_enqueue_scripts', 'pluginEnqueue');
