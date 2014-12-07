<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Site_cells extends Cell_Controller {

  // public function _cache_side_menu () {
  //   return array ('time' => 60 * 60, 'key' => null);
  // }
  public function side_menu () {
    return $this->load_view (array ('categories' => Category::find ('all')));
  }
  public function footer () {
    return $this->load_view ();
  }
}