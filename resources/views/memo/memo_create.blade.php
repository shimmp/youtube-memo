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
        <form action="/memos" method="POST">
            @csrf
            <input type"text" name= "memo[title]"placeholder="タイトル">
            <label for="title">内容</label>
            <textarea id="memo" name="memo[body]"></textarea>
            <input type="submit" value="作成">
        </form>
        <a href="/memos">戻る</a>
</body>
</html>
