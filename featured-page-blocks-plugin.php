<?php
/*
Plugin Name: Featured Page Blocks Section by RMcC
Plugin URI: #
Description: Add a featured blocks section to a page using the [featured_page_blocks_section] shortcode. Ideal for the Homepage. This plugin is translation-ready.
Version: 1.0.0
Author: robmccormack89
Author URI: #
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: featured-page-blocks
Domain Path: /languages/
*/

// don't run if someone access this file directly
defined('ABSPATH') || exit;

// define some constants
if (!defined('FEATURED_PAGE_BLOCKS_PATH')) define('FEATURED_PAGE_BLOCKS_PATH', plugin_dir_path( __FILE__ ));
if (!defined('FEATURED_PAGE_BLOCKS_URL')) define('FEATURED_PAGE_BLOCKS_URL', plugin_dir_url( __FILE__ ));
if (!defined('FEATURED_PAGE_BLOCKS_BASE')) define('FEATURED_PAGE_BLOCKS_BASE', dirname(plugin_basename( __FILE__ )));

// require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) require_once $composer_autoload;

// then require the main plugin class. this class extends Timber/Timber which is required via composer
new Rmcc\FeaturedPageBlocks;

// require action functions 
require_once('inc/functions.php');