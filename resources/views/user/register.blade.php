<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザ登録</title>
</head>
<body>
    <h1>ユーザ登録</h1>

    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
@endif

    <form method="post" action="/user/register">
        @csrf

        <div>
            <label>名前：</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>email：</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>パスワード：</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>パスワード（再度）：</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">登録する</button>
    </form>

    <p><a href="/">ログインへ戻る</a></p>
</body>
</html>