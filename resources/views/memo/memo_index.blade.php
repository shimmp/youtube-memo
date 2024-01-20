<x-app-layout>
    <x-slot name='head'>
    </x-slot>
    
             <a href="/memos/create"><div class="w-20 bg-indigo-300 font-black">メモを新しく作成する</div></a>
             <div>作成したメモ</div>
            @foreach ($memos as $memo)
                <div class="relative w-3/4 h-150 rounded-lg border border-inherit bg-red-50 shadow-2xl">
                    <a href="/memos/{{$memo->id}}/edit">
                     @if ($memo ->movie_id !== null)
                            <iframe src="https://www.youtube.com/embed/{{$memo->movie_id}}" title="YouTube video player" width="150" height="150" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        @else
                        <div>動画がありません</div>
                        @endif
                    <div class="absolute inset-x-0 top-0 h-16 left-40">{{$memo ->title}}</div>
                    </a>
                        <form action="/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class= "text-slate-500" type="button" onclick="deleteMemo({{$memo->id}})">
                                <div class="absolute top-0 right-0 h-16 rounded-lg border border-inherit bg-red-500 shadow-2xl">メモを削除する</div>
                            </button>
                        </form>
                </div>
                <div class = "h-1"> </div>
            @endforeach
            <script>
            function deleteMemo(id){
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</x-app-layout>