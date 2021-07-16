<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function index()
    {
        return view("admin.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...


            return redirect()->intended('/admin')->with("success", "Giriş İşlemi Başarılı");
        }
        else{
            return back()->with("error", "Kullanıcı Adı veya şifre Hatalı");
        }


    }

    public function logout()
    {
        Auth::logout();
        return redirect("/admin/login");
    }

}
