/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */


$(function() {

  $('.acc_trigger').click (function () {
    if ($(this).next ().is (':hidden')) {
      $('.acc_trigger').removeClass ('active').next ().slideUp ();
      $(this).toggleClass ('active').next ().slideDown ();
    } else {
      $(this).toggleClass ('active');
      $(this).next ().slideUp ();
    }
    return false;
  }).first ().click ();
});