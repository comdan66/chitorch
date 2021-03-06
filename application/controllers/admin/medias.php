<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Medias extends Admin_controller {
  public function __construct () {
    parent::__construct ();
    identity ()->user () || redirect (array ('admin'));
  }

  private function _delete ($ids) {
    array_map (function ($media) {
      array_map (function ($mpic) {
        $mpic->file_name->cleanAllFiles ();
        $mpic->delete ();
      }, $media->mpics);
      
      $media->delete ();
    }, Media::find ('all', array ('conditions' => array ('id IN (?)', $ids))));

    identity ()->set_session ('_flash_message', '刪除成功!', true);
    redirect (array ('admin', $this->get_class (), 'index'), 'refresh');
  }
  public function index ($offset = 0) {
    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $conditions = array ();

    $limit = 10;
    $total = Media::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $medias = Media::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));

    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('medias' => $medias, 'pagination' => $pagination));
  }
  public function delete () {
    if ($this->is_ajax ()) {
      $id = $this->input_post ('id');

      $mpic = Mpic::find ('one', array ('conditions' => array ('id = ?', $id)));
      $mpic->file_name->cleanAllFiles ();
      $mpic->delete ();
      return $this->output_json (array ('status' => true));
    } else {
      return $this->output_json (array ('status' => false));
    }
  }
  public function edit ($id = 0) {
    if (!($media = Media::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));

    if ($this->has_post ()) {
      $year = trim ($this->input_post ('year'));
      $title = trim ($this->input_post ('title'));
      $is_enabled = $this->input_post ('is_enabled');

      $files = $this->input_post ('files[]', true, true);
      $pics = ($pics = $this->input_post ('pics')) ? $pics : array ();

      if ($year && $title && ($files || $pics) && is_numeric ($is_enabled)) {
        if ($delete_pic_ids = array_diff (field_array ($media->mpics, 'id'), $pics))
          array_map (function ($mpic) {
            $mpic->file_name->cleanAllFiles ();
            $mpic->delete ();
          }, Media::find ('all', array ('conditions' => array ('id IN (?) AND media_id = ?', $delete_pic_ids, $media->id))));
          
        foreach ($files as $file)
          if (verifyCreateOrm ($mpic = Mpic::create (array ('media_id' => $media->id, 'file_name' => ''))))
            $mpic->file_name->put ($file);

        $media->title = $title;
        $media->is_enabled = $is_enabled;
        $media->year = $year;
        $media->save ();

        identity ()->set_session ('_flash_message', '修改成功!', true);
        redirect (array ('admin', 'medias'));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'media' => $media));
      }
    } else {
      $this->load_view (array ('media' => $media));
    }
  }
  public function create () {
    if ($this->has_post ()) {
      $year = trim ($this->input_post ('year'));
      $title = trim ($this->input_post ('title'));
      $files = $this->input_post ('files[]', true, true);
      $is_enabled = $this->input_post ('is_enabled');

      if ($year && $title && $files && is_numeric ($is_enabled)) {
        if (verifyCreateOrm ($media = Media::create (array ('title' => $title, 'is_enabled' => $is_enabled, 'year' => $year)))) {
          foreach ($files as $file)
            if (verifyCreateOrm ($mpic = Mpic::create (array ('media_id' => $media->id, 'file_name' => ''))))
              $mpic->file_name->put ($file);

          identity ()->set_session ('_flash_message', '新增成功!', true);
          redirect (array ('admin', 'medias'));
        } else {
          @$media->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }
}
