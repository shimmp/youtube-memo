<x-app-layout>
        <div class="relative w-full h-full">
            <a class="rounded-md bg-red-400" href="/dashboard/search">Choose a video</a>
            @if ($video_id !== null)
                <iframe class="w-1/2 aspect-[4/3]" src="https://www.youtube.com/embed/{{$video_id}}" title="YouTube video player"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @else
                <div>No video</div>
            @endif
        
        <form action="/memos" method="POST">
            @csrf
            <div class="absolute inset-y-0 right-20 w-2/5 h-full">
            <input type"text" name= "memo[title]"placeholder="title">
            <label for="title">content</label>
            <textarea class="w-full h-96" id="memo" name="memo[body]"></textarea>
            <input type="hidden" name="memo[video_id]" value="{{$video_id}}">
            <input class ="w-20 h-20 rounded-full bg-cyan-400" type="submit" value="create">
            </div>
        </form>
        <a href="/memos">return</a>
        </div>
</x-app-layout>
