<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class = "memos">
            @foreach ($memos as $memo)
                <div class = 'memo'>
                    <div class = 'root'><a href="/memos/{{$memo->id}}">{{$memo -> title}}</div>
                    <p class = 'body' >{{$memo->body}}</p>
                    <div class = 'edit'><a href = "/memos/{{$memo->id}}/edit">編集</div>
                    -------------------------------------------------------------------
                </div>
            @endforeach
            <div class = edit><a href ="/memos/create">作成</div>
            </div>
    </body>
</html>
</x-app-layout>