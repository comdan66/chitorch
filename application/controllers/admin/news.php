<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class News extends Admin_controller {
  public function __construct () {
    parent::__construct ();
    identity ()->user () || redirect (array ('admin'));
  }

  public function delete () {
    if ($this->is_ajax ()) {
      $id = $this->input_post ('id');

      $npic = Npic::find ('one', array ('conditions' => array ('id = ?', $id)));
      $npic->file_name->cleanAllFiles ();
      $npic->delete ();
      return $this->output_json (array ('status' => true));
    } else {
      return $this->output_json (array ('status' => false));
    }
  }
  private function _delete ($ids) {
    array_map (function ($new) {
      array_map (function ($npic) {
        $npic->file_name->cleanAllFiles ();
        $npic->delete ();
      }, $new->npics);

      $new->cover->cleanAllFiles ();
      $new->delete ();
    }, Neww::find ('all', array ('conditions' => array ('id IN (?)', $ids))));

    identity ()->set_session ('_flash_message', '刪除成功!', true);
    redirect (array ('admin', $this->get_class (), 'index'), 'refresh');
  }
  public function index ($offset = 0) {
    if ($delete_ids = $this->input_post ('delete_ids'))
      $this->_delete ($delete_ids);

    $start       = trim ($this->input_post ('start'));
    $end         = trim ($this->input_post ('end'));
    
    $conditions = $start && $end ? array ('date BETWEEN ? AND ?', $start, $end) : array ();

    $limit = 10;
    $total = Neww::count (array ('conditions' => $conditions));
    $offset = $offset < $total ? $offset : 0;
    $news = Neww::find ('all', array ('order' => 'id DESC', 'offset' => $offset, 'limit' => $limit, 'conditions' => $conditions));

    $page_total = ceil ($total / $limit);
    $now_page = ($offset / $limit + 1);
    $next_link = $now_page < $page_total ? base_url (array ('admin', $this->get_class (), $this->get_method (), $now_page * $limit)) : '#';
    $prev_link = $now_page - 2 >= 0 ? base_url (array ('admin', $this->get_class (), $this->get_method (), ($now_page - 2) * $limit)) : '#';
    $pagination = array ('total' => $total, 'page_total' => $page_total, 'now_page' => $now_page, 'next_link' => $next_link, 'prev_link' => $prev_link);

    $this->load_view (array ('start' => $start, 'end' => $end, 'news' => $news, 'pagination' => $pagination));
  }
  public function edit ($id = 0) {
    if (!($new = Neww::find ('one', array ('conditions' => array ('id = ?', $id)))))
      redirect (array ('admin', $this->get_class ()));

    if ($this->has_post ()) {
      $date = trim ($this->input_post ('date'));
      $title = trim ($this->input_post ('title'));
      $content = trim ($this->input_post ('content'));
      
      $y2 = trim ($this->input_post ('y2'));
      parse_str (parse_url ($y2, PHP_URL_QUERY ), $y2);
      $y2 = isset ($y2['v']) ? $y2['v'] : '';

      $cover = $this->input_post ('cover', true, true);
      $files = $this->input_post ('files[]', true, true);
      $pics = ($pics = $this->input_post ('pics')) ? $pics : array ();

      $is_enabled = $this->input_post ('is_enabled');

      if ($date && $title && $content && is_numeric ($is_enabled)) {
        if ($cover)
          $new->cover->put ($cover);

        if ($delete_pic_ids = array_diff (field_array ($new->npics, 'id'), $pics))
          array_map (function ($npic) {
            $npic->file_name->cleanAllFiles ();
            $npic->delete ();
          }, Npic::find ('all', array ('conditions' => array ('id IN (?) AND new_id = ?', $delete_pic_ids, $new->id))));
          
        foreach ($files as $file)
          if (verifyCreateOrm ($npic = Npic::create (array ('new_id' => $new->id, 'file_name' => ''))))
            $npic->file_name->put ($file);

        $new->title = $title;
        $new->date = $date;
        $new->content = $content;
        $new->y2 = $y2;
        $new->is_enabled = $is_enabled;
        $new->save ();

        identity ()->set_session ('_flash_message', '修改成功!', true);
        redirect (array ('admin', 'news'));
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！', 'media' => $media));
      }
    } else {
      $this->load_view (array ('new' => $new));
    }
  }

  public function create () {
    if ($this->has_post ()) {
      $date = trim ($this->input_post ('date'));
      $title = trim ($this->input_post ('title'));
      $content = trim ($this->input_post ('content'));
      
      $y2 = trim ($this->input_post ('y2'));
      parse_str (parse_url ($y2, PHP_URL_QUERY ), $y2);
      $y2 = isset ($y2['v']) ? $y2['v'] : '';

      $cover = $this->input_post ('cover', true, true);
      $files = $this->input_post ('files[]', true, true);

      $is_enabled = $this->input_post ('is_enabled');


      if ($date && $title && $content && $cover && is_numeric ($is_enabled)) {
       
        if (verifyCreateOrm ($new = Neww::create (array ('title' => $title, 'is_enabled' => $is_enabled, 'date' => $date, 'y2' => $y2, 'cover' => '', 'content' => $content)))) {
          $new->cover->put ($cover);

          foreach ($files as $file)
            if (verifyCreateOrm ($npic = Npic::create (array ('new_id' => $new->id, 'file_name' => ''))))
              $npic->file_name->put ($file);

          identity ()->set_session ('_flash_message', '新增成功!', true);
          redirect (array ('admin', 'news'));
        } else {
          @$new->delete ();
        }
      } else {
        $this->load_view (array ('message' => '填寫的資料不完整！'));
      }
    } else {
      $this->load_view ();
    }
  }
}
