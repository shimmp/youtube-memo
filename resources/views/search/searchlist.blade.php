<x-app-layout>
    @if ($error_message == null)
        @for ($i = 0; $i < $videos_count; $i++)
            <div class="flex">
                <div class = "w-10/12">
                    <div>
                        <a href="https://www.youtube.com/watch?v={{$videos_id[$i]}}">{{$videos_title[$i]}}</a>
                    </div>
                    <div>
                        <iframe src="https://www.youtube.com/embed/{{$videos_id[$i]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <form class="h-h-28" action="/memos/create" method="GET">
                        <!-- hidden フィールドを使用して $videos_id[$i] の情報を送信する -->
                        <input type="hidden" name="video_id" value="{{$videos_id[$i]}}">
                        <input class="h-full rounded-md bg-red-400" type="submit" value="make this video">
                </form>
            </div>
            <div class="h-1"></div>
        @endfor
        
    @else
      <div>{{$error_message}}</div>
    @endif
</x-app-layout>