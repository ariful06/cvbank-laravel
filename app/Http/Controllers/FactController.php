<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use App\Fact;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;

// use Illuminate\Database\Eloquent\SoftDeletes;

/*==========================================
Date : 05/03/2017
by Ahadul Islam@coder618
Fact Controller with image upload
==========================================*/

class FactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	return view('Admin.fact.create');
    }
    public function store(Request $request)
    {
        //Validate the form
        $this->validate($request, [
            'image' => 'required',
            'title' => 'required|min:4',
            'no_of_items' => 'required'
        ]);

    	
        $files = $request->file('image');
        $extension = File::extension( $files->getClientoriginalName() );
        $generated_fname = uniqid().".".$extension;

        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif'  ) {

            // Storage::put($generated_fname, file_get_contents($files) );
            $destinationPath = 'uploads';
            
            $files->move($destinationPath,  $generated_fname   );

            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['image'] = $generated_fname;
            Fact::create($data);

            Session::flash('message-success','Facts Successfully Added');
            return redirect('/dashboard/fact/create');
            return back()->withInput();


        }else{
            echo "not a valid file formate";
            Session::flash('message-error', 'File Formate not support');
            return redirect('/dashboard/fact/create');
            // return back()->withInput();

        }

    }


    public function index()
    {
        // $data = Fact::all()->where('user_id' ,Auth::id()) ;
        $data = Fact::where([
                    ['user_id', '=', Auth::id() ]
                ])->get();
        return view('Admin.fact.index', ['allFacts' => $data ]);    
    }


    public function indexDelete()
    {
        // echo "string";
        // die();
        $data = Fact::onlyTrashed()->where('user_id', Auth::id() )->get();;
        
        return view('Admin.fact.indexdelete', ['allFacts' => $data ]);
    }




    public function edit($id)
    {
        $data = Fact::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::id() ],
            ])->first();

        return view('Admin.fact.edit', compact('data'));
        // return view('')
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'image' => 'required',
            'title' =>'required|min:4',
            'no_of_items' => 'required'
        ]);

        $data = $request->all();


        $files = $request->file('image');

        if (!empty($files)) {
            // If new file selected for upload
            
            $destinationPath = 'uploads';

            $extension = File::extension( $files->getClientoriginalName() );
            $generated_fname = uniqid().".".$extension;

            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif'  ) {

                // Storage::put($generated_fname, file_get_contents($files) );
                $files->move($destinationPath,  $generated_fname   );


                $data['user_id'] = Auth::id();
                $data['image'] = $generated_fname;

                $mydata = Fact::find($id);
                $mydata->update($data);
                

                Session::flash('message-success','Facts Successfully Updated with image');
                // return redirect('/dashboard/fact/');
                return back()->withInput();




            }else{
                echo "not a valid file formate";
                Session::flash('message-error', 'File Formate not support');
                // return redirect('/dashboard/fact/create');
                return back()->withInput();
            }
            // echo "New file select";
        }else{
    
            $mydata = Fact::where([
                    ['id', '=', $id],
                    ['user_id', '=', Auth::id() ],
                ])->first();


            $data['user_id'] = Auth::id();
            $data['image'] = $mydata->image;

            $mydata->update($data);
            Session::flash('message-success','Facts Successfully Updated with previous image');
            // return redirect('/dashboard/fact/');
            return back()->withInput();

            echo "No file select";
        }
    }

    public function SoftDelete($id)
    {
        
        $data = Fact::where([
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
        
        $data = Fact::onlyTrashed()->where([
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
        $data = Fact::onlyTrashed()->where([
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



}
