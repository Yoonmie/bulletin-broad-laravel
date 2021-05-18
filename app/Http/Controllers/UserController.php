<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;
use App\Models\Post;

class UserController extends Controller
{
    
    public function index()
    {
        // dd("hi");
        $users = User::all();
        return view('users/UserList',compact('users'));
        if(Auth::user()->type == 1)
        {
            $users = User::all();
            return view('users/UserList',compact('users'));
        }
        else {
            return redirect()->route('post.index');
        }
        
    }

    public function search(Request $request)
    {
        $name=$request->name;
        if($name){
            $users = User::where('name', 'LIKE', "%" . $name . "%")->get();
        }
        $email=$request->input('email');
        if($email){
            $users = User::where('email', 'LIKE', "%" . $email . "%")->get();
        }
        $created_from=$request->input('created_from');
        $created_to=$request->input('created_to');
        if( $created_from && $created_to ){
            $users = User::where('created_at', '>=', $created_from)
                         ->where('created_at', '<=', $created_to)->get();
        }
        // dd($users,$created_from,$created_to);
        // $users = $users->paginate(5);

        if(count($users)>0){
            return view('/users/UserList', ['users'=>$users]);
        }
        else{
            return redirect('/user')->with('message','No Results found!');
        }
        
    }
   
    public function create(Request $request)
    {
       return view('users.UserCreate');
    }

   
    public function store(Request $request)
    {   
        //store data
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>$request->type,
            'phone'=>$request->phone,
            'dob'=>$request->dob,
            'address'=>$request->address,
            'image'=>$request->image, 
            'created_user_id' => Auth::user()->id,
        ]);
        return redirect()->route('user.index'); 
    }
    
    public function confirm(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',
            'type'=> 'required' ,
            'phone'=> 'required',
            'dob'=> 'required' ,
            'address'=> 'required',
            'image'=> 'required' , 
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);

        $path='images/'.$imageName;
        return view('users.UserConfirm', compact('request', 'path'));
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('users.UserProfile', compact('users'));
    }

    public function changepassword($id)
    {
        $users = User::find($id);
        return view('users.ChangePassword', compact('users')); 
    }

    public function updatepassword(Request $request,$id)
    {
        $this->validate($request,[
            'password'=> 'required|confirmed',
        ]);

        //update password
        $user=User::findOrfail($id);
        $user->password = Hash::make($request->password);
        $user->save(); 
        return redirect()->route('user.index');

    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('users.UserUpdate', compact('users')); 
    }

    
    public function update(Request $request,$id)
    {  
        $user=User::findOrfail($id);
        $user->name=request('name');
        $user->email=request('email');
        $user->type=request('type');
        $user->phone=request('phone');
        $user->dob=request('dob');
        $user->address=request('address');
        $user->image=request('image');
        $user->updated_user_id=Auth::user()->id;

        $user->save();        //saving data
        return redirect()->route('user.index');
    }

    public function usershow(Request $request, $id)
    { 
        $this->validate($request,[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'type'=> 'required' ,
            'phone'=> 'required',
            'dob'=> 'required' ,
            'address'=> 'required',
        ]);

        if($request->hasFile('updateimage')){
            $imageName = time().'.'.$request->updateimage->extension();
            $request->updateimage->move(public_path('images/'),$imageName);
        
            $path='images/'.$imageName;

       }else{
            $path=$request->image;
       }
      
       return view('users.UserUpdateConfirm', compact('request', 'path','id'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect()->route('user.index');
    }
}
