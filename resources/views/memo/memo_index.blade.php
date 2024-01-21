<x-app-layout>
    <x-slot name="head"> </x-slot>

  <!-- メモ作成画面へ-->
    <x-slot name="head"> </x-slot>
    <div class="h-25 relative w-16 rounded-lg border border-inherit bg-orange-400 shadow-2xl">
        <a href="/memos/create"><div class="font-black">Create a new memo</div></a>
    </div>
    <div>memo list</div>

  <!--一つ一つのメモ表示-->
    @foreach ($memos as $memo)
        <div class="relative w-3/4 rounded-lg border border-inherit bg-cyan-300 shadow-2xl">
            <a href="/memos/{{$memo->id}}/edit">
                @if ($memo ->movie_id !== null)
                    <iframe src="https://www.youtube.com/embed/{{$memo->movie_id}}" title="YouTube video player" width="150" height="150" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                @else
                    <div>No video</div>
                @endif
                <div class="absolute inset-x-0 left-40 top-0 h-16">{{$memo ->title}}</div>
            </a>
            <form action="/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                @csrf @method('DELETE')
                <button class="text-slate-500" type="button" onclick="deleteMemo({{$memo->id}})">
                    <div class="absolute right-0 top-0 h-full rounded-lg border border-inherit bg-red-600 text-black shadow-2xl"><div calss="absolute top-19">Delete memo</div></div>
                </button>
            </form>
        </div>
    <div class="h-1"></div>
    @endforeach

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
