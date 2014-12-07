<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Main extends Site_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function index () {
    $this->set_frame_path ('frame', 'site_index')
         ->load_view (null);
  }
  public function create () {
    // User::create (array ('account' => 'oa', 'password' => md5 ('123')));
  }
  public function demo () {
    // Category::create (array ('name' => 'cate_1'));
    // Category::create (array ('name' => 'cate_2'));
    // Category::create (array ('name' => 'cate_3'));
    // Category::create (array ('name' => 'cate_4'));
  }
}
