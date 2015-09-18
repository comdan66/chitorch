<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Pres extends Site_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function content ($id = 0) {
    ($pre = Pre::find ('one', array ('conditions' => array ('id = ?', $id)))) || redirect (array ($this->get_class ()));
    $this
          ->add_css (base_url (array ('resource', 'site', 'css', 'bootstrap.min.css')))
          ->add_javascript (base_url (array ('resource', 'site', 'js', 'bootstrap.min.js')))
          ->add_javascript (base_url (array ('resource', 'site', 'js', 'swipe.js')))
          ->load_view (array ('pre' => $pre));
  }

  public function index ($offset = 0, $pre_tag_id = 0) {
    $limit = 16;
    $total = Pre::count (array ('conditions' => array ('is_enabled = ?', 1)));
    $pres = $pre_tag_id ? Pre::find ('all', array (
              'order' => 'case when pre_tag_id = ' . $pre_tag_id . ' then 1 else 2 end, id DESC', 
              'offset' => $offset, 
              'limit' => $limit, 
              'conditions' => array ('is_enabled = ?', 1)
            )) : Pre::find ('all', array (
              'offset' => $offset, 
              'limit' => $limit, 
              'order' => 'id DESC', 
              'conditions' => array ('is_enabled = ?', 1)
            )); 
    
    $this->load->library ('pagination');
    $configs = array ('pres', '%s', $pre_tag_id);
    $configs = array (
        'uri_segment' => 2,
        'base_url' => base_url ($configs)
      );
    $offset = $offset < $total ? $offset : 0;
    $pagination = $this->pagination->initialize (array_merge (
      array ('total_rows' => $total, 'num_links' => 5, 'per_page' => $limit, 'uri_segment' => 0, 'base_url' => '', 'page_query_string' => false, 'first_link' => '第一頁', 'last_link' => '最後頁', 'prev_link' => '上一頁', 'next_link' => '下一頁', 'full_tag_open' => '<ul class="pagination">', 'full_tag_close' => '</ul>', 'first_tag_open' => '<li>', 'first_tag_close' => '</li>', 'prev_tag_open' => '<li class="UP">', 'prev_tag_close' => '</li>', 'num_tag_open' => '<li class="USE">', 'num_tag_close' => '</li>', 'cur_tag_open' => '<li class="NOUSE"><a href="#">', 'cur_tag_close' => '</a></li>', 'next_tag_open' => '<li class="NEXT">', 'next_tag_close' => '</li>', 'last_tag_open' => '<li>', 'last_tag_close' => '</li>'), $configs))->create_links ();

    $this->add_hidden (array ('id' => '_is_pres', 'value' => true))
         ->add_hidden (array ('id' => '_class', 'value' => 'pres'))
         ->load_view (array (
            'pres' => $pres, 
            'pre_tag_id' => $pre_tag_id, 
            'pagination' => $pagination
          ));
  }
}
