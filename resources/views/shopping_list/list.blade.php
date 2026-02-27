<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>買い物リスト(一覧画面)</title>
</head>
<body>
    <h1>「買うもの」の登録</h1>

    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form method="post" action="/shopping_list/register">
        @csrf
        「買うもの」名:
        <input type="text" name="name" style="width:140px;"><br>
        <button type="submit">「買うもの」を登録する</button>
    </form>

    <h1>「買うもの」一覧</h1>

    <div>
        <a href="/completed_shopping_list/list">購入済み「買うもの」一覧</a>
    </div>

    <table border="1">
        <tr>
            <th>登録日</th>
            <th>「買うもの」名</th>
        </tr>

        @foreach ($shoppingLists as $shoppingList)
            <tr>
                <td>{{ $shoppingList->created_at->format('Y/m/d') }}</td>
                <td>{{ $shoppingList->name }}</td>

                <td>
                <form method="post" action="/shopping_list/complete/{{ $shoppingList->id }}">
                    @csrf
                    <button type="submit">完了</button>
                </form>
                </td>

                <td style="width:15px;"></td>

                <td>
                    <form method="post" action="/shopping_list/delete/{{ $shoppingList->id }}">
                        @csrf
                        @method('delete')
                        <button type="submit">削除</button>
                    </form>
                </td>    
            </tr>
        @endforeach
    </table>

    <div>現在 {{ $shoppingLists->currentPage() }} ページ目</div>

    <div>
        <a href="{{ $shoppingLists->url(1) }}">最初のページ</a>
        /
        @if ($shoppingLists->onFirstPage())
            前に戻る
        @else
            <a href="{{ $shoppingLists->previousPageUrl() }}">前に戻る</a>
        @endif
        /
        @if ($shoppingLists->hasMorePages())
            <a href="{{ $shoppingLists->nextPageUrl() }}">次に進む</a>
        @else
            次に進む
        @endif
</div>

    <hr>

    <p style="margin-left:5%;"><a href="/logout">ログアウト</a></p>
</body>
</html>