<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Products extends Admin_controller {
  public function __construct () {
    parent::__construct ();
  }

  private function _delete ($ids) {
    array_map (function ($product) {
      array_map (function ($picture) { $picture->file_name->cleanAllFiles (); $picture->delete (); }, $product->pictures);
      array_map (function ($block) {
        array_map (function ($spec) { $spec->delete (); }, $block->specs);
        $block->delete ();
      }, $product->blocks);
      $product->delete ();
    }, Product::find ('all', array ('conditions' => array ('id IN (?)', $ids))));
  }
  public function index ($offset = 0) {
    $start       = trim ($this->input_post ('start'));
    $end         = trim ($this->input_post ('end'));
    $category_id = trim ($this->input_post ('category_id'));
    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $conditions = $start && $end && $category_id ? array ('date BETWEEN ? AND ? AND category_id = ?', $start, $end, $category_id) : ($start && $end ? array ('date BETWEEN ? AND ?', $start, $end) : ($category_id ? array ('category_id = ?', $category_id) : array ()));

    $limit = 10;
    $total = Product::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $products = Product::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));
    
    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('products' => $products, 'pagination' => $pagination, 'start' => $start, 'end' => $end, 'category_id' => $category_id));
  }
  public function categories () {

    if ($this->has_post ()) {
      if ($name = trim ($this->input_post ('name')))
        Category::create (array ('name' => $name, 'sort' => Category::count () + 1));

      if ($categories = $this->input_post ('categories')) {
        if ($delete_ids = array_diff (field_array (Category::find ('all', array ('select' => 'id')), 'id'), array_map (function ($category) { return $category['id']; }, $categories))) {
          Category::delete_all (array ('conditions' => array ('id IN (?)', $delete_ids)));
          Product::update_all (array ('set' => 'category_id = 0', 'conditions' => array ('category_id IN (?)', $delete_ids))); 
        }
        array_map (function ($category) {
          if ($category['id'] && trim ($category['name']) && trim ($category['sort']))
            Category::table ()->update ($set = array ('name' => trim ($category['name']), 'sort' => trim ($category['sort'])), array ('id' => $category['id']));
        }, $categories);
      }
    }

    $categories = Category::find ('all', array ('order' => 'sort DESC, id DESC'));
    $this->load_view (array ('categories' => $categories));
  }
  public function edit ($id = 0) {
    if (!($product = Product::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));
    
    if ($this->has_post ()) {
      $title = trim ($this->input_post ('title'));
      $is_enabled = $this->input_post ('is_enabled');
      $date = trim ($this->input_post ('date'));
      $category_id = $this->input_post ('category_id');

      $files = $this->input_post ('files[]', true, true);
      $pics = ($pics = $this->input_post ('pics')) ? $pics : array ();

      $block_1 = $this->input_post ('block_1');
      $block_1['specs'] = array_filter ($block_1['specs'], function ($spec) { return $spec['title'] && $spec['content']; });

      $block_2 = $this->input_post ('block_2');
      $block_2['specs'] = array_filter ($block_2['specs'], function ($spec) { return $spec['title'] && $spec['content']; });

      $block_3 = $this->input_post ('block_3');
      $block_3['specs'] = array_filter ($block_3['specs'], function ($spec) { return $spec['title'] || $spec['content']; });

      if ($date && $title && ($files || $pics) && $block_1['title'] && $block_1['specs'] && $block_2['title'] && $block_2['specs'] && $block_3['title'] && $block_3['specs'] && is_numeric ($is_enabled)) {
        if ($delete_pic_id = array_diff (field_array ($product->pictures, 'id'), $pics))
          array_map (function ($picture) {
            $picture->file_name->cleanAllFiles ();
            $picture->delete ();
          }, Picture::find ('all', array ('conditions' => array ('id IN (?) AND product_id = ?', $delete_pic_ids, $product->id))));

        array_map (function ($block) {
          array_map (function ($spec) { $spec->delete (); }, $block->specs);
          $block->delete ();
        }, $product->blocks);

        foreach ($files as $file)
          if (verifyCreateOrm ($picture = Picture::create (array ('product_id' => $product->id, 'file_name' => ''))))
            $picture->file_name->put ($file);

        $block = Block::create (array ('product_id' => $product->id, 'title' => $block_1['title']));
        foreach ($block_1['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
        
        $block = Block::create (array ('product_id' => $product->id, 'title' => $block_2['title']));
        foreach ($block_2['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
        
        $block = Block::create (array ('product_id' => $product->id, 'title' => $block_3['title']));
        foreach ($block_3['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
        
        $product->title = $title;
        $product->is_enabled = $is_enabled;
        $product->category_id = $category_id;
        $product->date = $date;
        $product->save ();
        
        redirect (array ('admin', 'products', 'index'));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'product' => $product));
      }
    } else {
      $this->load_view (array ('product' => $product));
    }
  }
  public function create () {
    if ($this->has_post ()) {
      $title = trim ($this->input_post ('title'));
      $is_enabled = $this->input_post ('is_enabled');
      $date = trim ($this->input_post ('date'));
      $category_id = $this->input_post ('category_id');

      $files = $this->input_post ('files[]', true, true);

      $block_1 = $this->input_post ('block_1');
      $block_1['specs'] = array_filter ($block_1['specs'], function ($spec) { return $spec['title'] && $spec['content']; });

      $block_2 = $this->input_post ('block_2');
      $block_2['specs'] = array_filter ($block_2['specs'], function ($spec) { return $spec['title'] && $spec['content']; });

      $block_3 = $this->input_post ('block_3');
      $block_3['specs'] = array_filter ($block_3['specs'], function ($spec) { return $spec['title'] || $spec['content']; });


      if ($date && $title && $files && $block_1['title'] && $block_1['specs'] && $block_2['title'] && $block_2['specs'] && $block_3['title'] && $block_3['specs'] && is_numeric ($is_enabled)) {
        if (verifyCreateOrm ($product = Product::create (array ('title' => $title, 'is_enabled' => $is_enabled, 'date' => $date, 'category_id' => $category_id)))) {
          foreach ($files as $file)
            if (verifyCreateOrm ($picture = Picture::create (array ('product_id' => $product->id, 'file_name' => ''))))
              $picture->file_name->put ($file);

          $block = Block::create (array ('product_id' => $product->id, 'title' => $block_1['title']));
          foreach ($block_1['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
          
          $block = Block::create (array ('product_id' => $product->id, 'title' => $block_2['title']));
          foreach ($block_2['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
          
          $block = Block::create (array ('product_id' => $product->id, 'title' => $block_3['title']));
          foreach ($block_3['specs'] as $spec) Spec::create (array ('block_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
          
          redirect (array ('admin', 'products', 'index'));
        } else {
          @$product->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }
}
