<?php

function featured_page_blocks_section() {
  
  // if timber::locations is empty (another plugin hasn't already added to it), make it an array
  if(!Timber::$locations) Timber::$locations = array();

  // add a new views path to the locations array
  array_push(
    Timber::$locations, 
    FEATURED_PAGE_BLOCKS_PATH . 'views'
  );
  
  $context = Timber::context();
  
  $out = Timber::compile('featured-page-blocks.twig', $context);
  return $out;
}