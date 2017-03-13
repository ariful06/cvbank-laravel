<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Auth;
use App\Hobbie;
use Illuminate\Support\Facades\Session;


class HobbiesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	return view('admin.hobbies.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required',
            'title' => 'required|min:4',
            'description' => 'required|min:10',
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
            Hobbie::create($data);

            Session::flash('message-success','Hobbies Successfully Added');
            return back()->withInput();
        }else{
            echo "not a valid file formate";
            Session::flash('message-error', 'File Formate not support');
            return redirect('/dashboard/hobbies/create');
            // return back()->withInput();

        }
    	
    }
    public function index()
    {
    	$data = Hobbie::where([
                    ['user_id', '=', Auth::id() ]
                ])->get();
        return view('Admin.hobbies.index', ['allHobbies' => $data ]);  
    }

    public function edit($id)
    {
        $data = Hobbie::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::id() ],
            ])->first();

        return view('Admin.hobbies.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'image' => 'required',
            'title' =>'required|min:4',
            'description' => 'required|min:10'
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

                $mydata = Hobbie::where([
                    ['id', '=', $id],
                    ['user_id', '=', Auth::id() ],
                ])->first();

                $mydata->update($data);
                

                Session::flash('message-success','Hobbie Successfully Updated with image');
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
    
            $mydata = Hobbie::where([
                    ['id', '=', $id],
                    ['user_id', '=', Auth::id() ],
                ])->first();


            $data['user_id'] = Auth::id();
            $data['image'] = $mydata->image;

            $mydata->update($data);
            Session::flash('message-success','Hobbies Successfully Updated with previous image');
            // return redirect('/dashboard/fact/');
            return back()->withInput();

            echo "No file select";
        }
    }

    public function indexDelete()
    {
        // echo "string";
        // die();
        $data = Hobbie::onlyTrashed()->where('user_id', Auth::id() )->get();;
        
        return view('Admin.hobbies.indexdelete', ['allHobbies' => $data ]);
    }


    public function SoftDelete($id)
    {
        
        $data = Hobbie::where([
            ['id', '=', $id],
            ['user_id', '=', Auth::id() ],
            ])->first();
        if ($data->delete()) {
            Session::flash('message-success','Hobbie Delete Success');
            return back()->withInput();
        }else{
            Session::flash('message-error','Hobbie Delete Failed');
            // return back()->withInput();
            return back()->withInput();

        }
    }

    public function PermanentDelete($id)
    {
        
        $data = Hobbie::onlyTrashed()->where([
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
        $data = Hobbie::onlyTrashed()->where([
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
