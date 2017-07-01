<?php

namespace Blockbuster\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Blockbuster\Http\Controllers\Controller;
//nueva
use Auth;

class AdminLoginController extends Controller
{

	public function __contruct()
	{
		$this->middleware('guest:admin');
	}

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	// Validae the form data
    	$this->validate($request,[
    		'correo' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	// Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['correo'=>$request->correo,'password'=>$request->password], $request->remember)){
    		//if sussefu then redirect ti their intentder location
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	

    	//if susseful, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('correo','remember'));
    }
}
