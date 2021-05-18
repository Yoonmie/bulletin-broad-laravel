<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        
        return view('Login');
    }

    public function store(Request $request)
    {

        //validate
         $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        
        // if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     dd($request,$users,"yes");
        // }
        // else{
        //     dd($request,$users,"no");
        // }
       
        // if(auth()->attempt($request->only('email','password'),$request->remember)){
           
            
           
            
        // }
        // else{
            
        //     dd($request,"no");
        //     // return back()->with('status','Invalid Email and Password');
        // }

        
        //redirect
        // return redirect()->route('dashboard');
    }
}
