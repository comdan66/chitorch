/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2014 OA Wu Design
 */

$(function () {
  $.fn.supersized.options = {  
    startwidth: 1000, //照片長度 
    startheight: 750, //照片寬度
    vertical_center: 1, //垂直居中 1居中 0關閉
    slideshow: 1, //自動輪播 1開 0關
    navigation:0, //播放控制鈕 1開 0關
    transition: 1, //0-None, 1-Fade, 2-slide top, 3-slide right, 4-slide bottom, 5-slide left //換場效果
    pause_hover: 1, //滑入停止輪播
    slide_counter: 1, //顯示圖片筆數 1開,0關
    slide_captions: 1, //圖片名稱
    slide_interval: 3000  //換場時間
  };

  $('#supersize').supersized(); 

  $('#MENUI a').each (function () {
    $(this).text ($(this).data ('en')).mouseenter (function () {
      $(this).text ($(this).data ('tw'));
    }).mouseleave (function () {
      $(this).text ($(this).data ('en'))
    });
  });
});