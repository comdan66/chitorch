$(function(){
  var $_flash_message = $('#_flash_message');
  if ($_flash_message.length && ($_flash_message.val ().trim () != '') && $_flash_message.val ().trim ().length)
    $.jGrowl ($_flash_message.val ().trim ());
});
