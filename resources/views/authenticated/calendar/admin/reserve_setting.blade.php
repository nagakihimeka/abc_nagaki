@extends('layouts.sidebar')
@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="sha-999 border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
  <p class="text-center">{{ $calendar->getTitle() }}</p>
  <div class="w-90 m-auto  border" style="border-radius:5px;">
      <div class="">
        {!! $calendar->render() !!}
      </div>

    <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
</div>

@endsection
