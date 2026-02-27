<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ユーザ一覧</title>
</head>
<body>

    <div style="margin-left:40px;"><a href="/admin/top">管理画面TOP</a></div>
    <div style="margin-left:40px;"><a href="/admin/user/list">ユーザ一覧</a></div>
    <div style="margin-left:40px;"><a href="/admin/logout">ログアウト</a></div>

    <h1>ユーザ一覧</h1>

    <table border="1">
        <tr>
            <th>ユーザID</th>
            <th>ユーザ名</th>
            <th>購入した「買うもの」の数</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->completed_count }}</td>
            </tr>
        @endforeach
    </table>

    <hr>
</body>
</html>