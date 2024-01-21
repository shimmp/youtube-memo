<x-app-layout>
  <div class="relative w-full h-full">
    @if ($memo->movie_id !== null)
      <iframe src="https://www.youtube.com/embed/{{$memo->movie_id}}" title="YouTube video player" width="830" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    @else
      <div>動画がありません</div>
    @endif
       <form action="/memos/{{$memo->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="absolute inset-y-0 right-20 w-2/5 h-full">
            <input class=""type"text" name= "memo[title]" value="{{$memo->title}}">
            <label for="title">content</label>
            <textarea class="w-full h-96" id="memo" name="memo[body]">{{$memo->body}}</textarea>
            <input type="hidden" name="memo[video_id]" value="{{$memo->movie_id}}">
            <input class ="w-20 h-20 rounded-full bg-cyan-400"type="submit" value="edit">
            </div>
        </form>
        <a href="/memos">return</a>
        </div>
</x-app-layout>
