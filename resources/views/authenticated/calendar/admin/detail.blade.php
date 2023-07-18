@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="w-100">
    <div class="reserve_detail">
      <div class="reserve_date">{{$reserve->setting_reserve}}</div>
      <div class="reserve_table">
        <table>
          <tr class="reserve_users">
            <th>ID</th>
            <th>名前</th>
            <th>場所</th>
          </tr>
          @foreach($users as $user)
          <tr class="reserve_user">
            <td>{{$user->id}}</td>
            <td>
              <span>{{$user->over_name}}</span>
              <span>{{$user->under_name}}</span>
            </td>
            <td>
              @if($reserve->setting_part == 1)
                <span>リモート</span>
              @elseif ($reserve->setting_part == 2)
                <span>リモート</span>
              @elseif ($reserve->setting_part == 3)
                <span>リモート</span>
              @endif
            </td>
          </tr>
          @endforeach
        </table>
      </div>
</div>




  </div>
</div>
@endsection
