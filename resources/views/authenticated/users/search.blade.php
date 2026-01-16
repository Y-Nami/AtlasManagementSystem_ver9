<x-sidebar>
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area w-75">
    @foreach($users as $user)
    <div class="border one_person bg-white">
      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span>女</span>
        @else
        <span>性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span>権限 : </span><span>教師(国語)</span>
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
        <span>
          @foreach($user->subjects as $subject)
          {{ $subject->subject }}
          @endforeach
        </span>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <!-- 右側 -->
  <div class="search_area w-25">
    <div class="">
      <div class="s_field mb-3">
        <label class="w-100 h5">検索</label>
        <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest" class="">
      </div>
      <div class="s_field mb-3">
        <label class="w-100">カテゴリ</label>
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div class="s_field mb-3">
        <label class="w-100">並び替え</label>
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="s_add_field">
        <p class="m-0 search_conditions">
          <span class="s_add">検索条件の追加</span>
          <span class="fas fa-angle-down s_angle1">　</span>
          <span class="fas fa-angle-up s_angle2 hidden">　</span>
        </p>
        <div class="search_conditions_inner">
          <div class="mb-3">
            <label class="w-100">性別</label>
            <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
          <div class="mb-3">
            <label class="w-100">権限</label>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer mb-3">
            <label class="w-100">選択科目</label>
            <div>
              @foreach($subjects as $subject)
              <span class="s_subject">
                {{ $subject->subject }}<input type="checkbox" name="subjects[]" value="{{ $subject->id }}" form="userSearchRequest">
              </span>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="s_submit">
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn btn-primary w-100">
      </div>
      <div class="s_reset">
        <input type="reset" value="リセット" form="userSearchRequest" class="justify-content-center">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
</x-sidebar>
