<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
  
    
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function adminaccess(Request $request){
        $this->validate($request , ['email'=> 'required' ,
                                    'password'=>'required']);

        $admin = Admin::where('email', $request->input('email'))->first();
        if($admin){
            if(Hash::check($request->input('password') , $admin->password)){
                Session::put('admin' , $admin);
                return redirect('/admin');
            }else{
            return back()->with('status' , 'Bad username or password');
            }
    
        }else{
    
            return back()->with('status' , 'you do not have access');
        }
    

    }
    public function logout(){
        Session::forget('admin');
        return view('admin.login');
    }

    
    public function addadmin(){
        return view('admin.addadmin');
    }
    public function saveadmin(Request $request){
        $this->validate($request , ['name' =>'required','email'=> 'email|required|unique:admins' ,
        'password'=>'required|min:4' , 'confirmpassword'=>'required|min:4']);
        if($request->input('password') == $request->input('confirmpassword') ){
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = bcrypt($request->input('password'));
            $admin->save();
            return back()->with('status' , 'admin account has been added');
        }
        
        return back()->with('error' , 'password is not matching');
       
    }

    public function alladmins(){
        $admins = Admin::All();
        return view('admin.adminlist')->with('admins', $admins);
    }


}
