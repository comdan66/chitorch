<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class PictureUploader extends OrmImageUploader {

  public function d4_url () {
    return '';
  }

  public function getVersions () {
    return array (
            '' => array (),
            '64x64' => array ('adaptiveResizeQuadrant', 64, 64, 'c'),
            '80x80' => array ('adaptiveResizeQuadrant', 80, 80, 'c'),
            '191x168' => array ('adaptiveResizeQuadrant', 191, 168, 'c'),
            '855x575' => array ('adaptiveResizeQuadrant', 855, 575, 'c'),
          );
  }
}