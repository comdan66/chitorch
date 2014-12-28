/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */

$(function() {
  $('.add_pic').click (function () {
    $('.files').append (_.template ($('#_file').html (), {}) ({}))
  }).click ();
});