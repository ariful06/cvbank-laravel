<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Session;



class ExperienceController extends Controller
{
	public function create()
	{
		return view('Admin.experience.create');
	}
  
	public function store(Request $request)
	{
    $this->validate($request, [
            'designation' => 'required|min:4',
            'start_date' => 'required',
            'company_location' => 'required|min:4',
            'company_name' => 'required|min:4',
    ]);

		$data = $request->all();
    $data['user_id'] = Auth::id();
    Experience::create($data);

    Session::flash('message-success', "Experience informaton successfully added");
    return back()->withInput();
	}






	public function index()
	{
		$data = Experience::where([
        ['user_id', '=', Auth::id() ]
    ])->get();

    //Check if item have any data
    if($data == null){ 
      Session::flash('message-error','Something going wrong');
      return back()->withInput();
    }

		return view('Admin.experience.index', ['allExperiences' => $data] );
	}


    public function edit($id)
    {
        $data = Experience::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::id() ],
            ])->first();


        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }

        return view('Admin.experience.edit', compact('data'));
    }

    public function update(Request $request, $id)   
    {
      $this->validate($request, [
            'designation' => 'required|min:4',
            'start_date' => 'required',
            'company_location' => 'required|min:4',
            'company_name' => 'required|min:4',
      ]);


      $mydata = Experience::where([
        ['id', '=', $id ],
        ['user_id', '=', Auth::id() ],
      ])->first();

      //Check if item have any data
      if($mydata == null){ 
        Session::flash('message-error','Something going wrong');
        return back()->withInput();
      }

      $data = $request->all();
      $data['user_id'] = Auth::id();

      $mydata->update($data);

      Session::flash('message-success','Information update successfully');
      return back()->withInput();
    
    }

    //SOFT DELETE
    public function destroy($id)
    {
      $data = Experience::where([
          ['id', '=', $id],
          ['user_id', '=', Auth::id() ],
          ])->first();

      //Check if item have any data
      if($data == null){ 
        return back()->withInput();
      }


      if ($data->delete()) {
          Session::flash('message-success','Information Delete Successfully');
          return back()->withInput();
      }else{
          Session::flash('message-error','Information Failed to Delete');
          // return back()->withInput();
          return back()->withInput();
      }
    }

    //Parmanent Delete
    public function PermanentDelete($id)
    {
        
        $data = experience::onlyTrashed()->where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id() ],
            ])->first();

        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }


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
        $data = experience::onlyTrashed()->where([
            ['id', '=', $id ],
            ['user_id', '=', Auth::id() ],
            ])->first();

        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }


        if($data->restore()){
            Session::flash('message-success','Restore Successfully done');
            // return back()->withInput();
            return redirect('/dashboard/experience/deleted');
        }else{
            Session::flash('message-error','Restore Failed');
            return redirect('/dashboard/experience/deleted');

            // return back()->withInput();            
        }
    }


    public function indexDelete()
    {
        
        $data = Experience::onlyTrashed()->where('user_id', Auth::id() )->get();
        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }
        
        return view('Admin.experience.indexDelete', ['allExperiences' => $data ]);
    }





}



