<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>買い物リスト 管理画面</title>
</head>
<body>
    <h1>管理画面 ログイン</h1>

    <form method="post" action="/admin/login">
        @csrf
        <div>
            ログインID：
            <input type="text" name="login_id">
        </div>
        <div>
            パスワード：
            <input type="password" name="password">
        </div>
        <button type="submit">ログインする</button>
    </form>
</body>
</html>