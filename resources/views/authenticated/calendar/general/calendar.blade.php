<x-sidebar>
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary mt-3" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<!-- 削除モーダル -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <div class="w-100">
      <div class="m-auto pt-3 pb-3">
        <p>
          <span>予約日：</span>
          <span class="target_day"></span>
        </p>
        <p>
          <span>時間：</span>
          <span class="reserve_part"></span>
        </p>
        <input type="hidden" class="reserve_setting_id" name="reserve_setting_id" value="" form="deleteParts">
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
      </div>
      <div class="w-50 m-auto delete-modal-btn d-flex">
        <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
        <button type="submit" class="btn btn-primary d-block" form="deleteParts">キャンセル</button>
      </div>
    </div>
  </div>
</div>
</x-sidebar>
