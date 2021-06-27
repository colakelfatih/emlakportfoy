<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Setting;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()

    {
        $this->middleware('guest:admin');
    }

    public function login()

    {

        //$setting = Setting::find(1);
        return view('admin.login', compact('setting'));

    }



    public function loginForm(Request $request)

    {

        $this->validate($request, [

            'email'         => 'required|email',
            'password'      => 'required'

        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))

        {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
