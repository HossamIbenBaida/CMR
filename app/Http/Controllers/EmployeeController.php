<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\History;
use App\Models\Admin;
use App\Models\Entreprise;
use App\Models\Invite;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    public function valider_invitation(Request $request){
        $this->validate($request , [ 'name' =>'required','email'=> 'email|required|unique:employees' ,
            'password'=>'required|min:4' , 'confirm_password'=>'required|min:4']);
        if($request->input('password') == $request->input('confirm_password') ){
            $Employee = new Employee();
            $Employee->admin_id = $request->input('admin_id');
            $Employee->entreprise_id = $request->input('entreprise_id');
            $Employee->name = $request->input('name');
            $Employee->telephone = $request->input('telephone');
            $Employee->adresse = $request->input('adresse');
            $Employee->date_de_naissance = $request->input('date_de_naissance');
            $Employee->email = $request->input('email');
            $Employee->password = bcrypt($request->input('password'));
            $Employee->save();
            Session::put('Employee' , $Employee);
            Cache::put('Employee' , $Employee);
            $history = History::where('employee_email',$Employee->email)->first();
            $admin = Admin::where('id', $Employee->admin_id )->first();
            $entreprise = Entreprise::where('id', $Employee->entreprise_id )->first();
            $history->description = $Employee->name." a validé l'invitation de ".$admin->name." à rejouindre ". $entreprise->name ;
            $history->update();
            $invitation = Invite::where('admin_id',$Employee->admin_id)->where('email', $Employee->email)->first();
            $invitation->validated=true;
            $invitation->update();
            return back()->with('status' , 'invitation has been validated');
    
        }
    
    return back()->with('error' , 'passwords are not matching');

    }
    public function employees_list(){
        $employees = Employee::with('admin')->with('entreprise')->get();
        return view('admin.employees_list')->with('employees' , $employees);
    }
    public function signin(){
        return view('employee.login');
    }
    public function access_account(Request $request){
        $this->validate($request , ['email'=> 'required' ,
        'password'=>'required']);

        $employee = Employee::where('email', $request->input('email'))->first();
        if($employee){
        if(Hash::check($request->input('password') , $employee->password)){
        Session::put('employee' , $employee);
        Cache::put('employee', $employee, 600);
        return redirect('/profile/'.$employee->id);
        }else{
        return back()->with('status' , 'incorrect email ou mot de passe');
        }

        }else{

        return back()->with('status' , 'informations incorrect !');
        }

                
                return view('employee.login');
         }
         public function profile($id){
            $employee = Employee::with('entreprise')->find($id);
            return view('employee.profile')->with('employee', $employee);
        }
        public function entreprise($id){
            $employee = Cache::get('employee');
            if($employee->entreprise_id == $id){
                $entreprise = Entreprise::find($id);
                $employees = $entreprise->employee;
                return view('employee.entreprise')->with('entreprise' , $entreprise)->with('employees' , $employees);
            }
            return redirect('/404');
        }

        public function  Editprofile($id){
            $employee = Cache::get('employee');
            if($employee->id == $id){
                return view('employee.updateprofile')->with('employee' , $employee);

            }
            return redirect('/404');
        }

        public function signout(){
            Session::forget('employee');
            Cache::forget('employee');
            return redirect('/signin');
        }
        public function updateprofile(Request $request){
            $this->validate($request , [ 'name' =>'required','email'=> 'email|required' ,
            'password'=>'required|min:4' , 'confirm_password'=>'required|min:4']);
            $employee = Employee::find(Session::get('employee')->id);

            if($request->input('password') == $request->input('confirm_password') ){
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->password = $request->input('email');
            $employee->telephone = $request->input('telephone');
            $employee->adresse = $request->input('adresse');
            $employee->date_de_naissance = $request->input('date_de_naissance');
            $employee->password = bcrypt($request->input('password'));
            $employee->update();
            Session::put('employee' , $employee);
            Cache::put('employee' , $employee);
            return back()->with('status' , 'Mise a jour enregistré');
            }
            return back()->with('status' , 'les mots de passe ne correspond pas');
        }
}
