$(function() {
  $('#select_all').click (function () {
    $('input[type="checkbox"][name="delete_ids[]"]').prop ('checked', $('#check_all').click ().is (':checked'));
  });
  $('#check_all').click (function () {
    $('input[type="checkbox"][name="delete_ids[]"]').prop ('checked', this.checked);
  });
});