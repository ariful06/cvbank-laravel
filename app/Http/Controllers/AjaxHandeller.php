<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AjaxHandeller extends Controller
{
    public function isEmailExist(Request $request)
     {

     	$email = $request->input('email');

     	$user = User::where('email', $email )->first();
		if ($user === null) {
		   // user doesn't exist
			echo '1';
		}else{
			echo "0";
		}


     }
}
