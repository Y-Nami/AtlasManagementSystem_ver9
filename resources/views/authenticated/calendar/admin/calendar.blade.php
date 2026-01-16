<x-sidebar>
  <div class="w-100 pt-5">
    <div class="w-75 m-auto pt-5 pb-5 bg-white">
      <div class="w-75 m-auto">
        <p class="text-center">{{ $calendar->getTitle() }}</p>
        <p>{!! $calendar->render() !!}</p>
      </div>
    </div>
</div>
</x-sidebar>
