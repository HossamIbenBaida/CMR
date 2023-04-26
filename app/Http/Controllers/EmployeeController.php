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
        return redirect('/profile')->with('employee',$employee);
        }else{
        return back()->with('status' , 'incorrect email ou mot de passe');
        }

        }else{

        return back()->with('status' , 'informations incorrect !');
        }

                
                return view('employee.login');
         }
         public function profile(){
            $employee = Session::get('employee');
            return view('employee.profile')->with('employee', $employee);
        }
}
