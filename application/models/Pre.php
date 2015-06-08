<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
// Pre.php
class Pre extends OaModel {

  static $table_name = 'pres';

  static $has_one = array (
    array ('first_picture', 'class_name' => 'PrePic', 'order' => 'id ASC'),
  );
  static $has_many = array (
    array ('pictures', 'class_name' => 'PrePic'),
    array ('blocks', 'class_name' => 'PreBl'),
  );
    static $belongs_to = array (
    array ('tag', 'class_name' => 'PreTag'),
  );
  public function __construct ($attributes = array (), $guard_attributes = TRUE, $instantiating_via_find = FALSE, $new_record = TRUE) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
}