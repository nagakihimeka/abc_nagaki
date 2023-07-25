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
 <div class="delete_modal delete_modal_content" name="delete_modal">
  <input class="m-auto p-0 w-75" style="font-size:12px" type="text" name="getData"  id="delete_day" value="delete_day" form="deleteParts" readonly ></input>
  <input class="m-auto p-0 w-75" style="font-size:12px"  name="getPart" id="delete_part" value="delete_part" form="deleteParts" readonly></input>
  <div class="modal_button">
    <button class="js-modal-close">閉じる</button>
  <input type="submit" class="btn btn-primary" value="削除する" form="deleteParts">
</div>

</div>
    <!-- // モーダル///////////////// -->
@endsection
