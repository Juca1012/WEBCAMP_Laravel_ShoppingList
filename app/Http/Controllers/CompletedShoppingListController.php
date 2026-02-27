<?php

namespace App\Http\Controllers;

use App\Models\CompletedShoppingList;

class CompletedShoppingListController extends Controller
{
    public function list()
    {
        $completedShoppingLists = CompletedShoppingList::where('user_id', auth()->id())
            ->orderBy('name')
            ->orderBy('created_at')
            ->get();

        return view('completed_shopping_list.list', compact('completedShoppingLists'));
    }
}