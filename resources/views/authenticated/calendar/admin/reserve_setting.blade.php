<x-sidebar>
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-75 border bg-white">
    <p class="text-center mt-3">{{ $calendar->getTitle() }}</p>
    <div>
      {!! $calendar->render() !!}
    </div>
    <div class="adjust-table-btn m-auto text-right">
      <input type="submit" class="btn btn-primary mt-3 mb-3" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
    </div>
  </div>
</div>
</x-sidebar>
