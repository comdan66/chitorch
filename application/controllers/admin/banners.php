<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Banners extends Admin_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function index () {
    
    if ($this->is_ajax ()) {
      $id = $this->input_post ('id');

      $banner = Banner::find ('one', array ('conditions' => array ('id = ?', $id)));
      $banner->file_name->cleanAllFiles ();
      $banner->delete ();
      
      return $this->output_json (array ('status' => true));
    } else {
      if ($this->has_post ()) {
        if (($file = $this->input_post ('file', true, true)) && verifyCreateOrm ($banner = Banner::create (array ('file_name' => ''))))
          $banner->file_name->put ($file);
      }
      $banners = Banner::find ('all', array ('order' => 'id DESC'));
      $this->load_view (array ('banners' => $banners));
    }
    
  }
}
