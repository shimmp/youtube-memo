<html>
  <head>
    <title>YouTube Searchlsit</title>
  </head>
  <body>
   
   {{-- @if ($error_message !== null) --}}
      @for ($i = 0; $i < $videos_count-1; $i++)
          <div>
            <a href="https://www.youtube.com/watch?v={{$videos_id[$i]}}">{{$videos_title[$i]}}</a>
          </div>
          <div>
            <iframe src="https://www.youtube.com/embed/{{$videos_id[$i]}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
       @endfor
   {{-- @else
      <div>{{$error_message}}</div>
    @endif　--}}
  </body>
</html>