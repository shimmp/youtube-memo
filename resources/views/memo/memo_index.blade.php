<x-app-layout>
  <x-slot name="head"> </x-slot>

  <!-- メモ作成画面へ-->
  <x-slot name="head"> </x-slot>
  <div class="relative w-16 rounded-lg border border-inherit bg-orange-400 shadow-2xl">
    <a href="/memos/create"><div class="font-black">Create a new memo</div></a>
  </div>
  <div>memo list</div>

  <!--一つ一つのメモ表示-->
  <div class="flex flex-col">
    @foreach ($memos as $memo)
    <div class="flex  h-36">
      <a class="w-10/12 rounded-lg bg-cyan-400" href="/memos/{{$memo->id}}/edit">
          <div class="flex">
              <div class="w-1/4">
            @if ($memo ->movie_id !== null)
            <iframe src="https://www.youtube.com/embed/{{$memo->movie_id}}" title="YouTube video player" width="150" height="140" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @else
            <div class="rounded-lg bg-cyan-400">No video</div>
            @endif
            </div>
          
          <div class="">{{$memo ->title}}</div>
        </div>
      </a>

        <form action="/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
          @csrf @method('DELETE')
          <button class="h-full text-slate-500 bg-rose-600 rounded-lg" type="button" onclick="deleteMemo({{$memo->id}})">
            <div class="text-black">Delete memo</div>
          </button>
        </form>
      
    </div>
    <div class="h-1"></div>
    @endforeach
  </div>

  <!--消去処理実行時の確認画面表示-->
  <script>
    function deleteMemo(id){
        'use strict'
        if (confirm('Once deleted, it cannot be restored. \nAre you sure you want to delete it？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
  </script>
</x-app-layout>
