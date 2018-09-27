<?php


  function yts_add_scripts(){
 
    wp_enqueue_style('yts-main-style', plugins_url(). '/youtubesubs/css/style.css');
    
    wp_enqueue_script('yts-main-script', plugins_url(). '/youtubesubs/js/main.js');

    wp_register_script('google', 'https://apis.google.com/js/platform.js');


    
    wp_enqueue_script('google');
  }

  add_action('wp_enqueue_scripts', 'yts_add_scripts');