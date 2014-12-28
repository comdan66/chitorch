<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Abouts extends Site_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function index ($t = 0) {
    $this->add_hidden (array ('id' => '_class', 'value' => 'abouts'))
         ->load_view (array ('t' => $t));
  }
}
