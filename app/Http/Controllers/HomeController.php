<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->roles == 'Professionel'){
            return view('professionels.home');
        }else if (Auth::user()->roles == 'Patient'){
            return view('patients.home');
        }else{
            return view('Admins.home');
        }
        
    }

    public function ImageUpload(Request $request){


        $file = $request->file('avatar');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
      
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$fileName);
        auth()->user()->avatar = $fileName;
        auth()->user()->save();
        return redirect()->back();

    }
    public function users(){
        $users = User::where('roles','!=','Admin')->get();
        return view('Admins.utilisateurs')->with('users',$users);
    }
}
