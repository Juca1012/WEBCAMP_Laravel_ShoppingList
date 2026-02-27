<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login_id', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/top');
        }

        return back();
    }

    public function logout()
    {
        \Illuminate\Support\Facades\Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}