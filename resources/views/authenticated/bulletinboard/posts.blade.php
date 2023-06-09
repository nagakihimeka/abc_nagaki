@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">

      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
        @foreach($post->user->subjects as $pos)
            <div class="">{{ $pos->subject }}</div>
            @endforeach
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{$post_comment->commentCounts($post->id)->count()}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id)}}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id)}}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>

  <div class="other_area border w-25">
    <div class="border m-4">
      <div class=""><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <input type="submit" name="like_posts" class="category_btn" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="category_btn" value="自分の投稿" form="postSearchRequest">
      <ul>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}"><span>{{ $category->main_category }}<span></li>
          <div class="sub_category">
            @foreach($category->subCategories as $sub)
            <button type="submit" name="category_word[]" form="postSearchRequest" value="{{$sub->id}}">{{$sub->sub_category}}</button>
            @endforeach
          </div>
        @endforeach
      </ul>
      <ul>

      </ul>

      <details open class="search">

        <summary class="">検索条件の追加<span class="search_icon"></span></summary>
        <div class="search">
          <div class="search_sex">
            <p>性別</p>
            <label for="men">男<input type="checkbox" value="1" id="men" form="postSearchRequest"></label>
            <label for="woman">女<input type="checkbox" value="2" id="men" form="postSearchRequest"></label>
          </div>
          <div class="">
            <p>権限</p>
            <select name="" id=""></select>
          </div>
          <div class="search_subject">
            <p class="">選択科目</p>
            @foreach($subjects as $subject)
              <label for="subject">{{$subject->subject}}<input type="checkbox" id="subject" name="subject[]" value="{{$subject->id}}" form="postSearchRequest"></label>
            @endforeach
          </div>
        </div>

    </details>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
