<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin', ['except' => ['adminLogout']]);
	}

    public function showLoginForm(){
    	return view('auth.admin-login');
    }

    public function login(Request $request){

    	$this->validate($request, [
    		'access_id' => 'required',
    		'password' => 'required|min:6'
    	]);

    	if (Auth::guard('admin')->attempt(['access_id' => $request->access_id,'password' => $request->password], $request->remember)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
