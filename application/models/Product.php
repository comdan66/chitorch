<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Product extends OaModel {

  static $table_name = 'products';

  static $has_many = array (
    array ('pictures', 'class_name' => 'Picture'),
    array ('blocks', 'class_name' => 'Block'),
  );
    static $belongs_to = array (
    array ('category', 'class_name' => 'Category'),
  );
  public function __construct ($attributes = array (), $guard_attributes = TRUE, $instantiating_via_find = FALSE, $new_record = TRUE) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
}