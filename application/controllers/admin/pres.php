<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Pres extends Admin_controller {
  public function __construct () {
    parent::__construct ();
    identity ()->user () || redirect (array ('admin'));
  }

  private function _delete ($ids) {

    array_map (function ($pre) {
      array_map (function ($picture) {
        $picture->file_name->cleanAllFiles ();
        $picture->delete ();
      }, $pre->pictures);

      array_map (function ($block) {
        array_map (function ($spec) {
          $spec->delete ();
        }, $block->specs);

        $block->delete ();
      }, $pre->blocks);

      $pre->delete ();
    }, Pre::find ('all', array ('conditions' => array ('id IN (?)', $ids))));
    
    identity ()->set_session ('_flash_message', '刪除成功!', true);
    redirect (array ('admin', $this->get_class (), 'index'), 'refresh');
  }

  public function index ($offset = 0) {
    $start       = trim ($this->input_post ('start'));
    $end         = trim ($this->input_post ('end'));
    $pre_tag_id  = trim ($this->input_post ('pre_tag_id'));

    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $conditions = $start && $end && $pre_tag_id ? array ('date BETWEEN ? AND ? AND pre_tag_id = ?', $start, $end, $pre_tag_id) : ($start && $end ? array ('date BETWEEN ? AND ?', $start, $end) : ($pre_tag_id ? array ('pre_tag_id = ?', $pre_tag_id) : array ()));

    $limit = 10;
    $total = Pre::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $pres = Pre::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));

    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('pres' => $pres, 'pagination' => $pagination, 'start' => $start, 'end' => $end, 'pre_tag_id' => $pre_tag_id));
  }
  public function pre_tags () {

    if ($this->has_post ()) {
      if (($name = trim ($this->input_post ('name'))) && verifyCreateOrm (PreTag::create (array ('name' => $name, 'sort' => PreTag::count () + 1))))
        identity ()->set_session ('_flash_message', '新增成功!', true) && redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');

      if ($pre_tags = $this->input_post ('pre_tags')) {
        if ($delete_ids = array_diff (field_array (PreTag::find ('all', array ('select' => 'id')), 'id'), array_map (function ($pre_tag) { return $pre_tag['id']; }, $pre_tags))) {
          PreTag::delete_all (array ('conditions' => array ('id IN (?)', $delete_ids)));
          Pre::update_all (array ('set' => 'pre_tag_id = 0', 'conditions' => array ('pre_tag_id IN (?)', $delete_ids)));
        }
        array_map (function ($pre_tag) {
          if ($pre_tag['id'] && trim ($pre_tag['name']) && trim ($pre_tag['sort']))
            PreTag::table ()->update ($set = array ('name' => trim ($pre_tag['name']), 'sort' => trim ($pre_tag['sort'])), array ('id' => $pre_tag['id']));
        }, $pre_tags);
        identity ()->set_session ('_flash_message', '修改成功!', true) && redirect (array ('admin', $this->get_class (), $this->get_method ()), 'refresh');
      }
    }

    $pre_tags = PreTag::find ('all', array ('order' => 'sort DESC, id DESC'));
    $this->load_view (array ('pre_tags' => $pre_tags));
  }
  public function edit ($id = 0) {
    if (!($pre = Pre::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));

    if ($this->has_post ()) {
      $title = trim ($this->input_post ('title'));
      $is_enabled = $this->input_post ('is_enabled');
      $date = trim ($this->input_post ('date'));
      $pre_tag_id = $this->input_post ('pre_tag_id');

      $files = $this->input_post ('files[]', true, true);
      $pics = ($pics = $this->input_post ('pics')) ? $pics : array ();

      $blocks = $this->input_post ('block');

      if ($date && $title && ($files || $pics) && is_numeric ($is_enabled)) {
        if ($delete_pic_ids = array_diff (field_array ($pre->pictures, 'id'), $pics))
          array_map (function ($picture) {
            $picture->file_name->cleanAllFiles ();
            $picture->delete ();
          }, PrePic::find ('all', array ('conditions' => array ('id IN (?) AND pre_id = ?', $delete_pic_ids, $pre->id))));

        array_map (function ($block) {
          array_map (function ($spec) { $spec->delete (); }, $block->specs);
          $block->delete ();
        }, $pre->blocks);

        foreach ($files as $file)
          if (verifyCreateOrm ($picture = PrePic::create (array ('pre_id' => $pre->id, 'file_name' => ''))))
            $picture->file_name->put ($file);

        if ($blocks) {
          foreach ($blocks as $block) {
            $specs = $block['specs'];
            $block = PreBl::create (array ('pre_id' => $pre->id, 'title' => $block['title'], 'type' => $block['type']));

            foreach ($specs as $spec)
              PreSp::create (array ('pre_bl_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
          }
        }
        $pre->title = $title;
        $pre->is_enabled = $is_enabled;
        $pre->pre_tag_id = $pre_tag_id;
        $pre->date = $date;
        $pre->save ();

        identity ()->set_session ('_flash_message', '修改成功!', true);
        redirect (array ('admin', 'pres'));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'pre' => $pre));
      }
    } else {
      $this->load_view (array ('pre' => $pre));
    }
  }
  public function create () {
    if ($this->has_post ()) {
      $title = trim ($this->input_post ('title'));
      $is_enabled = $this->input_post ('is_enabled');
      $date = trim ($this->input_post ('date'));
      $pre_tag_id = $this->input_post ('pre_tag_id');

      $files = $this->input_post ('files[]', true, true);

      $blocks = $this->input_post ('block');

      if ($date && $title && $files && is_numeric ($is_enabled)) {
        if (verifyCreateOrm ($pre = Pre::create (array ('title' => $title, 'is_enabled' => $is_enabled, 'date' => $date, 'pre_tag_id' => $pre_tag_id)))) {
          foreach ($files as $file)
            if (verifyCreateOrm ($picture = PrePic::create (array ('pre_id' => $pre->id, 'file_name' => ''))))
              $picture->file_name->put ($file);

          if ($blocks) {
            foreach ($blocks as $block) {
              $specs = $block['specs'];
              $block = PreBl::create (array ('pre_id' => $pre->id, 'title' => $block['title'], 'type' => $block['type']));

              foreach ($specs as $spec)
                PreSp::create (array ('pre_bl_id' => $block->id, 'title' => $spec['title'], 'content' => $spec['content']));
            }
          }
          identity ()->set_session ('_flash_message', '新增成功!', true);
          redirect (array ('admin', 'pres'));
        } else {
          @$pre->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }
}
