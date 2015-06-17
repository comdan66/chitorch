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

  var $_is_pres = $('#_is_pres');

  if ($_is_pres.length && $_is_pres.val ()) {
    $('.menu_pre').click (function () {
      var $sub_menu = $(this).next ('.sub_menu');
      if ($sub_menu.length)
        $sub_menu.is (':visible') ? $sub_menu.hide () : $sub_menu.show ();
    });
    $('.menu_pre').click ();
    $('.menu_pre_tag').click (function () {
      var $select = $('.pres[data-pre_tag_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
      var $not_select = $('.pres[data-pre_tag_id!="' + $(this).data ('id') + '"]').clone ().addClass ('cover');
      $('.pres').parents ('#probox').empty ().append ($select).append ($not_select);
    });
  } else {
    $('.menu_pre').click (function () {
      window.location.assign ($(this).data ('url'));
    });
  }


  $_class = $('#_class');
  if ($_class.length && $_class.val ()) {
    if ($_class.val () == 'abouts') {
      $('.sub_menu.about').show ();
      $('.ug.about').show ();

    } else if ($_class.val () == 'products') {
      $('.ug.ps').show ();
      $('.ug.ps a').click (function () {
      var $select = $('.products[data-category_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
      var $not_select = $('.products[data-category_id!="' + $(this).data ('id') + '"]').clone ().addClass ('cover');
        $('.products').parent ().empty ().append ($select).append ($not_select);
      });
      // var $select = $('.ug.products[data-category_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
    } else if ($_class.val () == 'pres') {
      $('.ug.prs').show ();
      $('.ug.prs a').click (function () {
      var $select = $('.pres[data-pre_tag_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
      var $not_select = $('.pres[data-pre_tag_id!="' + $(this).data ('id') + '"]').clone ().addClass ('cover');
        $('.pres').parent ().empty ().append ($select).append ($not_select);
      });
      // var $select = $('.ug.products[data-category_id="' + $(this).data ('id') + '"]').clone ().removeClass ('cover');
    }
  }
  var $rightSlide = $('#right_slide');
  $('#ALLBCENT #LEFTC h5').click (function () {
    if ($rightSlide.hasClass ('close')) {
      $rightSlide.removeClass ('close');
      $('body').css ('overflow', 'hidden');
    } else {
      $rightSlide.addClass ('close');
      $('body').css ('overflow', overflow);
    }
  });
  $('#slide_cover').click (function () {
    if (!$rightSlide.hasClass ('close')) {
      $rightSlide.addClass ('close');
      $('body').css ('overflow', overflow);
    }
  });
});
