
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.btn-danger').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.delete_modal_content').fadeIn();

    //日付取得
    var title = $(this).val();
    $("#delete_day").text(title);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.delete_modal_content').fadeOut();
    return false;
  });
});
