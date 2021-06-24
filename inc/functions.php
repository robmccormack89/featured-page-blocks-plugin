<?php

function featured_page_blocks_section() {
  
  $context = Timber::context();
  
  $out = Timber::compile('featured-page-blocks.twig', $context);
  return $out;
}