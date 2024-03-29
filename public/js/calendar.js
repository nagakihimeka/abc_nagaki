
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.btn-danger').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    $('.delete_modal_content').fadeIn();

    //日付取得
    var title = $(this).val();
    $("#delete_day").val(title);

    //部数と場所取得
    var result = $(this).data('part');
    $("#delete_part").val(result);
    return false;
  });


  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.delete_modal_content').fadeOut();
    return false;
  });
});


$(function () {
  $('.post_main_category').click(function () {
    $(this).next('.post_category_inner').slideToggle();
    //icon
    $(this).find(".search_close").toggleClass('search_open');
  });
});
