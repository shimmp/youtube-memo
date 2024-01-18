<x-app-layout>
    <x-slot name='head'>
        <title>javaメモ</title>
        <!-- Fonts -->
       
    </x-slot>
        <div>
            <a href="/dashboard/search">動画を選ぶ</a>
            <iframe src="https://www.youtube.com/embed/{{$video_id}}" title="YouTube video player" width="600" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <form action="/memos" method="POST">
            @csrf
            <input type"text" name= "memo[title]"placeholder="タイトル">
            <label for="title">内容</label>
            <textarea id="memo" name="memo[body]"></textarea>
            <input type="hidden" name="memo[video_id]" value="{{$video_id}}">
            <input type="submit" value="作成">
        </form>
        <a href="/memos">戻る</a>
</x-app-layout>
