<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\About;
use Auth;



class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data = About::where([
    		['user_id', '=', Auth::id() ],
    	])->first();

    	return view('Admin.about.index')->with(compact('data'));
    	print_r($data);
    }

    public function edit()
    {
    	$data = About::where([
    		['user_id', '=', Auth::id()],
    	])->first();

    	return view('Admin.About.edit', compact('data'));
    }

    public function update(Request $request)
    {

    	$this->validate($request, [
            // 'image' => 'required',
            'title' =>'required|min:5',
            'phone' => 'required|numeric|min:5',
            'bio' => 'required|min:15',
        ]);


    	$data = About::where([
    		['user_id', '=', Auth::id() ],
    	])->first();

    	$formdata = $request->all();

    	if($data->update($formdata)){
            Session::flash('message-success', 'Information Update Successfull');
            return redirect('/dashboard/about');
    		
    	}else{
            Session::flash('message-error', 'Error to update');
            return back()->withInput();
    	}
    }







}
