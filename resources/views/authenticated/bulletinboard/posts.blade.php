@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">

      <p class="post_name"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p class="post_title"><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status post_subcategory">
          @foreach($post->subCategories as $pos)
            <span class="">{{ $pos->sub_category }}</span>
          @endforeach
        </div>

        <div class="post_icon">
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
      <div class="post_input_icon"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="search_input">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input type="submit" value="検索" form="postSearchRequest">
      </div>
      <input type="submit" name="like_posts" class="like_posts category_btn" value="いいねした投稿" form="postSearchRequest">
      <input type="submit" name="my_posts" class="my_posts category_btn" value="自分の投稿" form="postSearchRequest">


       <div class="category_search">
          <p>カテゴリー検索</p>
          @foreach($mains as $main)
          <ul class="post_category">
            <label for="" class="post_main_category">{{$main->main_category}}
              <span class="search_close"></span>
            </label>
            <div class="post_category_inner">
              @foreach($main->subCategories as $sub)
              <li><button type="submit" value="{{$sub->id}}" name="category_word" form="postSearchRequest">{{$sub->sub_category}}</button>
              </li>
            @endforeach
            </div>
          </ul>
          @endforeach

        </div>

  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
