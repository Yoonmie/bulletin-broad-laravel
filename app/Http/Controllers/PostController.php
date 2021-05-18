<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Imports\PostImport;
use Excel;

class PostController extends Controller
{
    public function index()
    {
        $posts= Post::orderBy('created_at', 'DESC')->paginate(2);
        return view('/posts/Postlist',compact('posts'));
        // $auth = Auth::user();
        // if($auth -> type == 1 ){
        //     // $posts = Post::all()->paginate(2)->get();
          
        //     $posts= Post::orderBy('created_at', 'DESC')->paginate(2);
        //     return view('/posts/Postlist',compact('posts'));
        // }
        // else {
        //     $authid = $auth -> id;
        //     $posts = Post::where('created_user_id', "=" , $authid)->get();
        //     return view('/posts/Postlist',compact('posts'));
        // }
    }

    public function search(Request $request)
    {
        

        $search=$request->input('search');
        // $posts = Post::where('title','LIKE','%'.$search.'%')
        //         ->orWhere('description','LIKE','%'.$search.'%')->get();

        $posts = Post::where('title','LIKE','%'.$search.'%')
                ->orWhere('description','LIKE','%'.$search.'%')->paginate(2);
      
        if(count($posts)>0)
        {
            return view('/posts/PostList', compact('posts'));
        }
        else {
                return redirect('/post')->with('message','No Results found!');
        }
    }


    public function create()
    {
        return view('/posts/CreatePost');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->status =1;
        $post->created_user_id =Auth::user()->id;
        $post->save();
        return redirect()->route('post.index');

    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
        ]);

        return view('posts/PostConfirm', compact('request'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts/UpdatePost', compact('posts')); 
    }

    public function showpostupdate(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
        ]);

        if($request->status!=null) {
            $updatedstatus= $request->status = 1;
            return view('posts/UpdateConfirm', compact('request','updatedstatus')); 
        }
        else{
           $updatedstatus= $request->status = 0;
            return view('posts/UpdateConfirm', compact('request', 'updatedstatus')); 
        }
        
    }
    
    public function update(Request $request, $id)
    {
    //    dd($request,$id);
        $post = Post::findOrfail($id);
        $post -> title = request('title');
        $post -> description = request('description');
        $post -> status = request('status');
        $post -> updated_user_id = Auth::user()->id;

        $post->save();        //saving data
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> delete();
        return redirect()->route('post.index');
    }

    // public function importForm()
    // {
    //     return view('/posts/import-form');
    // }

    // public function import(Request $request)
    // {
    //     Excel::import(new PostImport, $request->file);
    //     return "Record are imported successfully!";
    // }

    public function importExportView()
    {
       return view('/posts/import-form');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new PostExport, 'posts.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new PostImport,request()->file('file'));
             
        return redirect('/post')->with('message', 'Posts uploaded successfully.');
    }

}
