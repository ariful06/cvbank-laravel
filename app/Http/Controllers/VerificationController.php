<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    /*
    ------------------------
    by - coder618
    purpose : update isactive field with 1 if the key found in Table
    ------------------------    
    */   
    public function UserVerification(Request $request)
    {
        // if user already registed then redirect to dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }


    	$this->validate($request, [
        'key' => 'required|min:8|max:50',
        ]);

    	$key = $request->input('key');

    	if ( User::where('key', '=', $key  )->exists() ) {
            //Key found in database
    		$user  = User::where('key', $key ) -> first();
    		$user = User::find($user->id);

    		if ($user->isactive == 1) {
    			
		    	Session::flash('message-success', 'Account already activated ');
		    	return redirect('/verify');
    		}elseif ( $user->isactive == 0 ) {

    			$user->isactive = 1;
		    	$check = $user->update();
 
		    	if ($check == true) {

                    //START Active EMAIL FUNCTION

                    About::firstOrCreate(['user_id' => $user->id, 'title'=>'','bio'=>'','phone'=>'Not set'  ]);


                    //END EMAIL FUNCTION

		    		Session::flash('message-success', 'Account Activated You can login now');
		    		return redirect('/verify');
		    	}else{
		    		Session::flash('message-error', 'Failed to active the account');
		    		return redirect('/verify');
		    	}	
    		}	    	
		}else{
			Session::flash('message-error', 'Verification Kye Not matched');
			return redirect('/verify');
        	// return redirect('admin/services');

		}	
    }


    /*
    ------------------------
    by - coder618
    purpose : update users table KEY by Uniqid which row will match with email address 
    ------------------------    
    */
    public function NewVerificationCode(Request $request)
    {
        // if user already registed then redirect to dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        $this->validate($request, [
        'email' => 'required|email|min:6',
        ]);
        
        $email = $request->input('email');
        $key = uniqid();

        if ( User::where('email', '=', $email  )->exists() ) {
            //Email address found in database
            $user  = User::where('email', $email ) -> first();
            $user = User::find($user->id);

            if ($user->isactive == 1) {
                // If user account already activated
                Session::flash('message-success', "Your account already activated");
                return redirect('/verify');
            }else{
                // If user account not activated
                $user->key = $key;
                $user->update();
                Session::flash('message-success', 'New key Sent to you email address, please verify');
                // sign up Email Function start

                // Email function End
                return redirect('/verify');
            }
        }else{
            Session::flash('message-error', "No user registred with {$email} address");
            return redirect('/verify');
        }
    }

    public function index()
    {
        Auth::logout();
        return view('verify');
    }
}
