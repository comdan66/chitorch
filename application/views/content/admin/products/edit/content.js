/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */

$(function() {
  $('.add_pic').click (function () {
    $('.files').append (_.template ($('#_file').html (), {}) ({}))
  }).click ();

  $('.add_spec').click (function () {
    var $specs_selector = $('.' + $(this).data ('parent') + '_specs');
    var obj = {i: $specs_selector.children ('table').length + 1, parent: $(this).data ('parent')};
    $specs_selector.append (_.template ($('#_spec').html (), obj) (obj));
  });

  $('.del_pic').click (function () {
    $(this).parents ('li').remove ();
  });
});