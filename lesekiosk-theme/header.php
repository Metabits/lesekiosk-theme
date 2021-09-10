<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
  </head>
<body <?php body_class("bg-white text-gray-900"); ?>>
  <div class="content-wrapper main-container">
    <header class="py-4 flex items-center justify-between">
      <div class="logo">
        <?php the_custom_logo();?>
      </div>
      <a href="#main-navigation" class="mobile-toggle-btn md:hidden text-primary">
        <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.346 28.346" class="svg-icon">
          <path d="M21.844 20.124H6.502m15.342-5.95H6.502m15.342-5.951H6.502" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
        </svg>
      </a>
      <nav class="main-nav" id="main-navigation">
        <a href="#top" class="mobile-toggle-btn mobile-toggle-btn-close md:hidden text-white">
          <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.346 28.346" class="svg-icon">
            <path clip-path="url(#SVGID_2_)" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" d="M19.598 19.598L8.75 8.75M8.749 19.598L19.597 8.75"></path>
          </svg>
        </a>
        <?php html5blank_nav(); ?>
      </nav>
    </header>
    <main class="main-content flex-grow">
  
