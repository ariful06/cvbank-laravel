<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


	public function create()
	{
		return view('Admin.post.create');
	}
  
	public function store(Request $request)
	{
	    $this->validate($request, [
	            'title' => 'required|min:4',
	            'description' => 'required|min:20',
	    ]);

			$data = $request->all();
	    $data['user_id'] = Auth::id();
	    Post::create($data);

	    Session::flash('message-success', "Post successfully added");
	    return back()->withInput();
	}






	public function index()
	{
		$data = post::where([
            ['user_id', '=', Auth::id() ]
        ])->get();

    

		return view('Admin.post.index', ['allPosts' => $data] );
	}




    public function edit($id)
    {
        $data = Post::where([
                ['id', '=', $id],
                ['user_id', '=', Auth::id() ],
            ])->first();


        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }
        
        return view('Admin.post.edit', compact('data'));
    }


    public function update(Request $request, $id)   
    {
		$this->validate($request, [
	            'title' => 'required|min:4',
	            'description' => 'required|min:20',
	    ]);
      


	    $mydata = Post::where([
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

	    Session::flash('message-success','Information updated successfully');
	    return back()->withInput();
    }

    //SOFT DELETE
    public function destroy($id)
    {
    	$data = Post::where([
        	['id', '=', $id],
        	['user_id', '=', Auth::id() ],
    	])->first();

   
		//Check if item have any data
	    if($data == null){ 
	    	Session::flash('message-error','Something going wrong');
	    	return back()->withInput();
	    }


      if ($data->delete()) {
          Session::flash('message-success','Information Deleted Successfully');
          return back()->withInput();
      }else{
          Session::flash('message-error','Information Failed to Delete');
          return back()->withInput();
      }
    }

    public function restore($id)
    {
        $data = Post::onlyTrashed()->where([
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
            return redirect('/dashboard/post/deleted');
        }else{
            Session::flash('message-error','Restore Failed');
            return redirect('/dashboard/post/deleted');

        }
    }



    //Parmanent Delete
    public function PermanentDelete($id)
    {
        
        $data = Post::onlyTrashed()->where([
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

    


    public function indexDelete()
    {
        
        $data = Post::onlyTrashed()->where('user_id', Auth::id() )->get();
        //Check if item have any data
        if($data == null){ 
          Session::flash('message-error','Something going wrong');
          return back()->withInput();
        }
        
        return view('Admin.post.indexDelete', ['allPosts' => $data ]);
    }




}
