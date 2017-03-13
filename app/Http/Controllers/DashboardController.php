<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


/*
======================================================
By 	-Ahadul islam @ coder618
For -Controller Access of Dashboard,login, logout etc
======================================================
*/
class DashboardController extends Controller
{
    public function showDashboard()
    {
    	if (Auth::check()) {
    		return view('dashboard');
		}else{
			return redirect('/login');
		}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }

    public function newUserRegistration()
    {
    	if (Auth::check()) {
	    	return redirect('/dashboard');
		}else{
			return view('Admin.Authentication.registration');
		}
    }


    
}
