<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Data Debugger */

if(!function_exists('pd')){
  function pd($d){
    echo '<pre>';
      print_r($d);
    echo '</pre>';
    die();
  }
}

if(!function_exists('vd')){
  function vd($d){
    echo '<pre>';
      var_dump($d);
    echo '</pre>';
    die();
  }
}
/* Custom URL */

if ( ! function_exists('image_url')){
  function image_url($image_name = ''){
    $CI =& get_instance();
    return $CI->config->base_url('assets/images/'.$image_name);
  }
}

if ( ! function_exists('assets_url')){
  function assets_url($ass_name = ''){
    $CI =& get_instance();
    return $CI->config->base_url('assets/'.$ass_name);
  }
}