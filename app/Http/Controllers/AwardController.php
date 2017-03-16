<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Award;
use Auth;
use Illuminate\Support\Facades\Session;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	return view('Admin.award.create');
    }

    public function store(Request $request)
	{
		$this->validate($request, [
            'title' => 'required|min:4',
            'location' => 'required|min:4',
            'organization' => 'required|min:4',
            'description' => 'required|min:10',
            'year' => 'required|min:4',
        ]);


		$data = $request->all();
        $data['user_id'] = Auth::id();
        Award::create($data);
        
        Session::flash('message-success', "Award informaton successfully added");
        return back()->withInput();
	}

	public function index()
    {
        // $data = Fact::all()->where('user_id' ,Auth::id()) ;
        $data = Award::where([
                    ['user_id', '=', Auth::id() ]
                ])->get();
        return view('Admin.award.index', ['allAwards' => $data ]);    
    }

    public function edit($id)
    {
        $data = Award::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::id() ],
            ])->first();

        return view('Admin.award.edit', compact('data'));
        // return view('')
    }

    public function update(Request $request, $id)		
    {
    	$this->validate($request, [
            'title' => 'required|min:4',
            'location' => 'required|min:4',
            'organization' => 'required|min:4',
            'description' => 'required|min:10',
            'year' => 'required|min:4',
        ]);


    	$mydata = Award::where([
    		['id', '=', $id ],
    		['user_id', '=', Auth::id() ],
    	])->first();

    	if ($mydata == null) {
            return back()->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::id();

        $mydata->update($data);

        Session::flash('message-success','Information update successfully');
        return back()->withInput();
    	
    }

    public function SoftDelete($id)
    {
        
        $data = Award::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id() ],
            ])->first();
        if ($data->delete()) {
            Session::flash('message-success','Facts Delete Success');
            return back()->withInput();
        }else{
            Session::flash('message-error','Facts Delete Failed');
            // return back()->withInput();
            return back()->withInput();
        }
    }

    public function PermanentDelete($id)
    {
        
        $data = Award::onlyTrashed()->where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id() ],
            ])->first();

        if($data->forceDelete()){
            Session::flash('message-success','Item Permanent Deleted');
            return back()->withInput();
        }else{
            Session::flash('message-error','Delete Failed');
            return back()->withInput();
        }
    }

    public function restore($id)
    {
        $data = Award::onlyTrashed()->where([
            ['id', '=', $id ],
            ['user_id', '=', Auth::id() ],
            ])->first();

        if($data->restore()){
            Session::flash('message-success','Restore Successfully done');
            return back()->withInput();
        }else{
            Session::flash('message-error','Restore Failed');
            return back()->withInput();            
        }
    }


    public function indexDelete()
    {
        // echo "string";
        // die();
        $data = Award::onlyTrashed()->where('user_id', Auth::id() )->get();;
        
        return view('Admin.award.indexDelete', ['allAwards' => $data ]);
    }







}
