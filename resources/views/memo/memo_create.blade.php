<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>javaメモ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
                body {
                    display: grid;
                    place-items: center; /* 画面中央に配置するためのスタイル */
                    height: 100vh; /* 画面の高さいっぱいに広がるようにするためのスタイル */
                }
            
                form {
                    display: grid;
                    grid-template-columns: 1fr 1fr; /* 2列のグリッドレイアウト */
                    gap: 10px; /* 要素間の間隔 */
                    width: 600px; /* formタグ全体の幅 */
                }
            
                textarea {
                    height: 600px;
                    grid-column: span 2; /* 2列にわたるようにする */
                }
            
                input {
                    /* その他のスタイル */
                }
        </style> 
    </head>
    <body>
        <div>
            <a href="/dashboard/search">動画を選ぶ</a>
            <iframe src="https://www.youtube.com/embed/{{$video_id}}" title="YouTube video player" width="800" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
    </body>
</html>
