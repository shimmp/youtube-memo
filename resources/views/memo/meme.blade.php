<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非同期メモ作成</title>
</head>
<body>

<form id="memoForm">
    @csrf
    <div>
        タイトル: <input type="text" id="title" name="title" placeholder="メモのタイトル">
    </div>
    <div>
        本文: <textarea id="body" name="body" placeholder="メモの内容"></textarea>
    </div>
    <button type="button" onclick="createMemo()">メモを作成</button>
</form>

<script>
    function createMemo() {
        var formData = new FormData(document.getElementById('memoForm'));

        // Ajaxリクエストの送信
        fetch('/memos/store', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // メモが作成された後の処理（例えば、メモの表示やリダイレクトなど）
            console.log('Memo created:', data);
        })
        .catch(error => {
            console.error('Error creating memo:', error);
        });
    }
</script>

</body>
</html>
