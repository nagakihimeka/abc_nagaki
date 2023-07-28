@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="sha-999 border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
  <p class="text-center">{{ $calendar->getTitle() }}</p>
    <div class="w-90 m-auto  border" style="border-radius:5px;">
      <div class="">
        {!! $calendar->render() !!}
      </div>

    <div class="reserve_button text-right  m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">

    </div>
  </div>
</div>

 <!-- // モーダル///////////////// -->

 <div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>

 <div class="delete_modal delete_modal_content" name="delete_modal">
    <div class="delete_modal_box">
        <p>予約日：
          <input class="m-auto p-0 w-75 delete_day" style="font-size:12px" type="text" name="getData"  id="delete_day" value="delete_day" form="deleteParts" readonly ></input>
          </p>
        <p>場所：
          <input class="m-auto p-0 w-75 delete_part" style="font-size:12px"  name="getPart" id="delete_part" value="delete_part" form="deleteParts" readonly></input>
        </p>
        <p style="font-size:12px">上記の予約をキャンセルしてもよろしいですか？</p>
        <div class="modal_button">
          <button class="btn-primary js-modal-close">閉じる</button>
          <input type="submit" class="btn-danger delete_btn" value="キャンセル" form="deleteParts">
        </div>
      </div>

  </div>
    </div>
    <!-- // モーダル///////////////// -->
@endsection
