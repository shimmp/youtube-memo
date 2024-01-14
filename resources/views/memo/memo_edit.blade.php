<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>javaメモ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            textarea{
                width: 100%;
                height: 300px;
            }
        </style>    
    </head>
    <body>
        <div>
            <iframe src="https://www.youtube.com/embed/{{$memo->movie_id}}" title="YouTube video player" width="800" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <form action="/memos/{{$memo->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type"text" name= "memo[title]" value="{{$memo->title}}">
            <label for="title">内容</label>
            <textarea id="memo" name="memo[body]" >{{$memo->body}}</textarea>
            <input type="hidden" name="memo[video_id]" value="{{$memo->movie_id}}">
            <input type="submit" value="編集">
        </form>
        <a href="/memos">戻る</a>
</body>
</html>
