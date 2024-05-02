<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        if($request->getMethod() == "POST"){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], false)){
                return redirect()->route('admin.index');
            }else{
                return redirect()->back()->with('error', 'Invalid Credentials');
            }
        }else{
            return view('admin.Login.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
