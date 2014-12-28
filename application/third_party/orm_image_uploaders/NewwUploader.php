<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class NewwUploader extends OrmImageUploader {

  public function d4_url () {
    return '';
  }

  public function getVersions () {
    return array (
            '' => array (),
            '80x80' => array ('adaptiveResizeQuadrant', 80, 80, 'c'),
            '120x120' => array ('adaptiveResizeQuadrant', 120, 120, 'c'),
          );
  }
}