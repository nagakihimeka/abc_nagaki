@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border one_person sha-99">
      <div>
        <span class="user_item">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span class="search_user_item">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span class="search_user_item">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span class="search_user_item">性別 : </span><span>男</span>
        @elseif($user->sex == 3)
        <span>性別 : </span><span>その他</span>
        @else
        <span>性別 : </span><span>女</span>
        @endif
      </div>
      <div>
        <span class="search_user_item">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span class="search_user_item">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>権限 : </span><span>講師(英語)</span>
        @else
        <span>権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
         @foreach($user->subjects as $subject)
            <span class="">{{ $subject->subject }}</span>
            @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25 border">
    <div class="">
      <div class="search_box">
        <label>検索</label>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div class="search_box">
        <label>カテゴリ</label>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="search_box">
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="search_box">

        <label class="m-0 search_conditions">検索条件の追加<span class="search_close"></span></label>
        <div class="search_conditions_inner">
          <div class="search_condition">
            <label>性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
          </div>
          <div class="search_condition">
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer search_condition">
            <label>選択科目</label>
            <div class="search_condition_subjects">
              @foreach($subjects as $subject)
              <label for="subject">{{$subject->subject}}<input type="checkbox" id="subject" name="subject[]" value="{{$subject->id}}" form="userSearchRequest"></label>
              @endforeach
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="search_buttons">
          <div class="search_btn">
            <input type="submit" name="search_btn" value="検索" form="userSearchRequest">
          </div>
          <div class="search_reset">
            <input type="reset" value="リセット" form="userSearchRequest">
          </div>
      </div>

    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
