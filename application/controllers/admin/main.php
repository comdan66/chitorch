<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */
class Main extends Admin_controller {
  public function __construct () {
    parent::__construct ();
  }

  public function index () {
    if (identity ()->user ()) redirect (array ('admin', 'login'));

    $message = null;
    if ($this->has_post () && ($account = trim ($this->input_post ('account'))) && ($password = trim ($this->input_post ('password'))))
      if ($user = User::find ('one', array ('select' => 'id, login_count, logined_at', 'conditions' => array ('account = ? AND password = ?', $account, md5 ($password))))) {
        $user->login_count += 1;
        $user->logined_at = date ('Y-m-d H:i:s');
        $user->save ();
        identity ()->set_session ('user_id', $user->id) && redirect (array ('admin', 'login'));
      }
       else 
        $message = '帳號密碼錯誤，請重新輸入!';

    $this->load_view (array ('message' => $message));
  }

  public function login () {
    $this->load_view ();
  }
  public function edit () {
    $message = '';
    if ($this->has_post () && ($account = trim ($this->input_post ('account'))) && ($password = trim ($this->input_post ('password'))) && ($re_password = trim ($this->input_post ('re_password')))) {
      if ($password == $re_password) {
        identity ()->user ()->account = $account;
        identity ()->user ()->password = md5 ($password);
        identity ()->user ()->save ();
      } else {
        $message = '確認密碼錯誤!';
      }
    }
    $this->load_view (array ('message' => $message));
  }
}
