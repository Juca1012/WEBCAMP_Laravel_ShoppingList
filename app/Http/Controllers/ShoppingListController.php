<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use App\Models\CompletedShoppingList;

class ShoppingListController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        ShoppingList::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);

        return redirect('/shopping_list/list')
            ->with('message', '「買うもの」を登録しました！！');
    }

    public function list()
    {
        $shoppingLists = ShoppingList::where('user_id', auth()->id())
        ->orderBy('name')
        ->paginate(12);

    return view('shopping_list.list', compact('shoppingLists'));
    }

    public function delete($id)
    {
    $shoppingList = ShoppingList::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $shoppingList->delete();

    return redirect('/shopping_list/list')
        ->with('message', '「買うもの」を削除しました！！');
    }

    public function complete($id)
    {
        $shoppingList = ShoppingList::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        CompletedShoppingList::create([
            'user_id' => $shoppingList->user_id,
            'name' => $shoppingList->name,
        ]);

        $shoppingList->delete();

        return redirect('/shopping_list/list')
            ->with('message', '「買うもの」を完了にしました！！');
    }
}
