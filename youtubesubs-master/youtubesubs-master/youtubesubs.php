<?php
/*
Plugin Name: YouTube Subs
Description: Display or Hiding a YouTube sub button and the count of number of subscribers
Version: 1.0.0
Author: Farnaz Faeghnia
Author URI: https://www.jcub.edu.au/
*/

if(!defined('ABSPATH')){
  exit;
}

require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-class.php');


require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-scripts.php');


function register_youtubesubs(){
  register_widget('Youtube_Subs_Widget');
}


add_action('widgets_init', 'register_youtubesubs');