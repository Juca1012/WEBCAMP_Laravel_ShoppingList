<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>買い物リスト(購入済み「買うもの」一覧)</title>
</head>
<body>
    <h1>購入済み「買うもの」一覧</h1>

    <div><a href="/shopping_list/list">「買うもの」一覧に戻る</a></div>

    <table border="1">
        <tr>
            <th>「買うもの」名</th>
            <th>購入日</th>
        </tr>

        @foreach ($completedShoppingLists as $completedShoppingList)
            <tr>
                <td>{{ $completedShoppingList->name }}</td>
                <td>{{ $completedShoppingList->created_at->format('Y/m/d') }}</td>
            </tr>
        @endforeach
    </table>

    <hr>
    <p><a href="/logout">ログアウト</a></p>
</body>
</html>