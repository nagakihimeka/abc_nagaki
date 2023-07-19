$('.search_conditions').click(function () {

});

$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle();
    $(this).find(".search_close").toggleClass('search_open');
  });

  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
  });
});

// 開閉ボタン
$('.subject_edit_btn').click(function () {
  $(this).find(".close").toggleClass('open');
});
