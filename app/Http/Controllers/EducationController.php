<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Education;
use Auth;
use Illuminate\Support\Facades\Session;


class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Education::where([            
            ['user_id', "=", Auth::id() ],
        ])->get();

        return view('Admin.education.index', ['allEducation' => $data ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'             => 'required|min:5|max:20',
            'result'            => 'required|min:2|max:20',
            'passing_year'      => 'required|min:2|max:20',
            'main_subject'      => 'required|min:2|max:20',
            'education_board'   => 'required|min:2|max:20',
            'course_duration'   => 'required|min:2|max:20',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id() ;
        echo "<pre>";
        print_r($data);

        $chk = Education::create($data);

        if ($chk) {
            Session::flash('message-success', 'Education successfully added');
            return redirect('/dashboard/education');
        }else{
            Session::flash('message-error', 'Education failed to added');
            // return redirect('/dashboard/educaion');
            return back()->withInput();

        }

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Education::where([
            ['id', '=', $id],
            ['user_id', "=", Auth::id()],
        ])->first();

        return view('Admin.education.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // dd($data);
        // echo "string";
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $mydata = Education::where([
            ['id', '=', $id],
            ['user_id' , '=', Auth::id() ],
        ])->first();

        if ($mydata == null) {
            return redirect('/dashboard/education');
        }


        $mydata->update($data);
        Session::flash('message-success','Information update successfully');



        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Education::onlyTrashed()->where([
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
}
