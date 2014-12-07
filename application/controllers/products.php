<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Products extends Site_controller {
  public function __construct () {
    parent::__construct ();
    $this->add_hidden (array ('id' => '_is_projects', 'value' => true));
  }

  public function content ($id = 0) {
    ($product = Product::find ('one', array ('conditions' => array ('id = ?', $id)))) || redirect (array ($this->get_class ()));
    $this
          ->add_css (base_url (array ('resource', 'site', 'css', 'bootstrap.min.css')))
          ->add_javascript (base_url (array ('resource', 'site', 'js', 'bootstrap.min.js')))
          ->add_javascript (base_url (array ('resource', 'site', 'js', 'swipe.js')))
          ->load_view (array ('product' => $product));
  }

  public function index ($offset = 0) {
    $limit = 16;
    $total = Product::count (array ('conditions' => array ('is_enabled = ?', 1)));
    $offset = ($offset < $total) || ($offset >= 0) ? $offset : 0;
    $products = Product::find ('all', array ('offset' => $offset, 'limit' => $limit, 'order' => 'id DESC', 'conditions' => array ('is_enabled = ?', 1)));

    $this->load->library ('pagination');
    
    $a = $total / $limit;
    $s = $offset / $limit;
    $pagination_config = array (
      'total_rows' => $total,
      'page_query_string' => true,
      'query_string_segment' => 'per_page',
      'num_links' => 2 + ((3 - $s) > 0 ? 3 - $s : ($s - ($a - 3) > 0 ? $s - ($a - 3): 0)),
      'per_page' => $limit,
      'base_url' => base_url (array ($this->get_class (), $this->get_method ())),
      'first_link' => '',
      'last_link' => '', 
      'prev_link' => '上一頁', 
      'next_link' => '下一頁',
      'uri_segment' => $offset ? 3 : 0, 
      'page_query_string' => false, 
      'full_tag_open' => '<ul class="pagination">', 
      'full_tag_close' => '</ul>',
      'first_tag_open' => '', 
      'first_tag_close' => '', 
      'prev_tag_open' => '<li class="UP">', 
      'prev_tag_close' => '</li>', 
      'num_tag_open' => '<li class="USE">', 
      'num_tag_close' => '</li>',
      'cur_tag_open' => '<li class="NOUSE">', 
      'cur_tag_close' => '</li>',
      'next_tag_open' => '<li class="NEXT">', 
      'next_tag_close' => '</li>', 
      'last_tag_open' => '', 
      'last_tag_close' => '',
      );
    $this->pagination->initialize ($pagination_config);
    $pagination = $this->pagination->create_links ();

    $this->load_view (array ('products' => $products, 'pagination' => $pagination));
  }
}
