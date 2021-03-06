<?php
namespace Rmcc;
use Timber\Timber;

class FeaturedPageBlocks extends Timber {

  public function __construct() {
    parent::__construct();
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));

    add_action('plugins_loaded', array($this, 'plugin_timber_locations'));
    add_action('plugins_loaded', array($this, 'plugin_text_domain_init'));    
    // add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_assets'));
    
    add_shortcode('featured_page_blocks_section', 'featured_page_blocks_section'); 
  }
  
  public function plugin_timber_locations() {
    // if timber::locations is empty (another plugin hasn't already added to it), make it an array
    if(!Timber::$locations) Timber::$locations = array();
    // add a new views path to the locations array
    array_push(
      Timber::$locations, 
      FEATURED_PAGE_BLOCKS_PATH . 'views'
    );
  }
  public function plugin_text_domain_init() {
    load_plugin_textdomain('featured-page-blocks', false, FEATURED_PAGE_BLOCKS_BASE. '/languages');
  }
  public function plugin_enqueue_assets() {
    wp_enqueue_style(
      'featured-page-blocks',
      FEATURED_PAGE_BLOCKS_URL . 'public/css/featured-page-blocks.css'
    );
  }
  
  public function add_to_twig($twig) { 
    if(!class_exists('Twig_Extension_StringLoader')){
      $twig->addExtension(new Twig_Extension_StringLoader());
    }
    return $twig;
  }
  public function add_to_context($context) {
    return $context;    
  }
}