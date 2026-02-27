<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        // ユーザごとの「購入済み数」を取得する
        $users = User::withCount([
            'completedShoppingLists as completed_count'
        ])->orderBy('id')->get();

        return view('admin.user_list', compact('users'));
    }
}
