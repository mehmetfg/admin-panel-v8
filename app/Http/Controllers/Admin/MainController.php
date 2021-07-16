<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    //

    public function index()
    {

     $user=   User::where("id", Auth::id())->first();
        return view("Admin.main")->with("user", $user);
    }

}
