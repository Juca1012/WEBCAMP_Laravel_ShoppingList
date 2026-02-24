<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function register(UserRegisterPost $request)
    {
        $datum = $request->validated();

        // パスワードをハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        User::create($datum);

        return redirect('/')->with('message', 'ユーザを登録しました！！');
    }
}
