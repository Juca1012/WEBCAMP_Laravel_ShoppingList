<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>買い物リスト</title>
</head>
<body>
    <h1>ログイン</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
    @endif

    <form method="post" action="/login">
        @csrf

        <div>
            <label>email：</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>パスワード：</label>
            <input type="password" name="password">
        </div>

        <button type="submit">ログインする</button><br>
    </form>
        <a href="/user/register">会員登録</a>
    
</body>
</html>