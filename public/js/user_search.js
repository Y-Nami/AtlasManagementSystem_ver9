$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').stop(true, true).slideToggle();
    $(this).find('.s_angle1').toggleClass('hidden');
    $(this).find('.s_angle2').toggleClass('hidden');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').stop(true, true).slideToggle();
    $('.s_p_angle1').toggleClass('hidden');
    $('.s_p_angle2').toggleClass('hidden');
  });
});
