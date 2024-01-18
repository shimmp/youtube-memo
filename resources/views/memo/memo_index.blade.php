<x-app-layout>
    <x-slot name='head'>
        
        
    </x-slot>
    
        <div class = "memos">
            @foreach ($memos as $memo)
                <div class='memo'>
                    <div class='root'><a href="/memos/{{$memo->id}}">{{$memo -> title}}</a></div>
                    <p class='body' >{{$memo->body}}</p>
                    <div class='edit'><a href="/memos/{{$memo->id}}/edit">編集</a></div>
                    <div>
                        <form action="/memos/{{$memo->id}}" id="form_{{$memo->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='text-slate-500'  type="button" onclick="deleteMemo({{$memo->id}})">削除</button>
                        </form>
                    </div>
                    -------------------------------------------------------------------
                </div>
            @endforeach
            <div class = edit><a href ="/memos/create">作成</div>
            </div>
            <script>
            function deleteMemo(id){
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</x-app-layout>