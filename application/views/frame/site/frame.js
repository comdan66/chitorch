/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */

$(function () {
  var $_is_projects = $('#_is_projects');
  if ($_is_projects.length && $_is_projects.val ()) {
    $('.menu_project').click (function () {
      var $sub_menu = $(this).next ('.sub_menu');
      if ($sub_menu.length)
        $sub_menu.is (':visible') ? $sub_menu.hide () : $sub_menu.show ();
    });
    $('.menu_project').click ();

    $('.menu_category').click (function () {
      var $select = $('.products[data-category_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
      var $not_select = $('.products[data-category_id!="' + $(this).data ('id') + '"]').clone ().addClass ('cover');
      $('.products').parent ().empty ().append ($select).append ($not_select);
    });
  } else {
    $('.menu_project').click (function () {
      window.location.assign ($(this).data ('url'));
    });
  }
});
