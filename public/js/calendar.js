
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.btn-danger').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.delete_modal_content').fadeIn();
    // // 押されたボタンから投稿内容を取得し変数へ格納
    // var post = $(this).attr('post');
    // // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    // var post_id = $(this).attr('post_id');

    // // 取得した投稿内容をモーダルの中身へ渡す
    // $('.modal_post').text(post);
    // // 取得した投稿のidをモーダルの中身へ渡す
    // $('.modal_id').val(post_id);
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
  $('#delete_date').on('click', function () {
    var title = $('#delete_date').val()
    $("#delete_day").text(title);

    // console.log(title)
  })
})
