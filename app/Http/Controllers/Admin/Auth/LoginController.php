<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        // Validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);


        // Attemp to log the user in
        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){
            // If successful, then redirect to their intended location
            return redirect()->intended(route('lang.admin.dashboard'));
        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('lang.admin.login'));
    }
}
