<?php

namespace App\Http\Controllers;

use App\Experience;


use Illuminate\Http\Request;

class ExperienceController extends Controller
{
	public function create()
	{
		return view('Admin.experience.create');
	}
	public function store(Request $request)
	{
		$data = $request->all();
        $data['user_id'] = 1;
        Experience::create($data);
        return redirect('dashboard/experience/index');
	}
	public function index()
	{
		$data = Experience::paginate(5);
		return view('Admin.experience.index', ['allExperience' => $data] );
	}
	public function show($id)
	{
		$data = Experience::find($id);
		return view('Admin.experience.view',compact('data'));
	}

    public function edit($id)
    {
        $data = Experience::find($id);
        return view('Admin.experience.edit', compact('data'));
    }
    public function update(Request $request,$id){
       $data=$request->all();
       $myData = Experience::find($id);
       $myData->update($data);
       return redirect('dashboard/experience/index');
    }
    public function destroy($id){
        $data = Experience::find($id);
        $data->delete();
        return redirect('dashboard/experience/index');
    }

}



