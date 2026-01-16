<x-sidebar>
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      @foreach($post->subCategories as $sub_category)
      <input type="submit" class="category_btn" value="{{ $sub_category->sub_category }}">
      @endforeach
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{ $post_comment->commentCounts($post->id) }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <!-- 検索バー -->
  <div class="other_area w-25">
    <div class="m-4">
      <div class="w-100">
        <a href="{{ route('post.input') }}" class="w-100 btn btn-primary">投稿</a>
      </div>
      <div class="d-flex align-items-center flex-wrap mt-1">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="w-75 form-control rounded-end-0">
        <input type="submit" value="検索" form="postSearchRequest" class="btn btn-primary w-25 rounded-start-0">
      </div>
      <div class="d-flex align-items-center flex-wrap mt-1">
        <input type="submit" name="like_posts" class="btn btn-primary w-50 bg-pink" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="btn btn-primary w-50 bg-yellow" value="自分の投稿" form="postSearchRequest">
      </div>
      <div class="mt-2 font-size-14">
        <p>カテゴリー検索</p>
        <ul>
          @foreach($categories as $category)
          <li class="main_categories" category_id="{{ $category->id }}">
              <div class="main_category_wrap">
                <p class="main_category">{{ $category->main_category }}</p>
                <p class="angle_mark">
                  <span class="fas fa-angle-down angle1"></span>
                  <span class="fas fa-angle-up angle2 hidden"></span>
                </p>
              <div>
              <ul class="sub_categories">
                @foreach($category->subCategories as $sub_category)
                <li class="sub_category mb-3">
                  <input type="submit" name="category_word" class="" value="{{ $sub_category->sub_category }}" form="postSearchRequest">
                </li>
                @endforeach
              </ul>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
