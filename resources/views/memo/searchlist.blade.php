<x-app-layout>
  <head>
    <title>YouTube Searchlsit</title>
  </head>
  <body>
   
   {{-- @if ($error_message !== null) --}}
    @for ($i = 0; $i < $videos_count; $i++)
        <div>
            <a href="https://www.youtube.com/watch?v={{$videos_id[$i]}}">{{$videos_title[$i]}}</a>
        </div>
        <div>
            <iframe src="https://www.youtube.com/embed/{{$videos_id[$i]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <form action="/memos/create" method="GET">
            <div>
                <!-- hidden フィールドを使用して $videos_id[$i] の情報を送信する -->
                <input type="hidden" name="video_id" value="{{$videos_id[$i]}}">
                <input type="submit" value="この動画にする">
            </div>
        </form>
    @endfor
   {{-- @else
      <div>{{$error_message}}</div>
    @endif　--}}
  </body>
</html>
</x-app-layout>