$(function () {
  $('.delete-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var target_day = $(this).attr('target_Day');
    var target_part = $(this).attr('target_part');
    var reserve_setting_id = $(this).attr('reserve_setting_id');
    $('.target_day').text(target_day);
    $('.reserve_part').text(target_part);
    $('.reserve_setting_id').val(reserve_setting_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});
