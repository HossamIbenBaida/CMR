<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\History;
use App\Models\Admin;
use App\Models\Entreprise;
use App\Mail\InviteCreated;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class InviteController extends Controller
{
    public function invite()
{
    $entreprises = Entreprise::All()->pluck('name', 'id');

    return view('admin.inviteemployee')->with('entreprises' ,$entreprises);

}

public function process(Request $request)
{
      // validate the incoming request data
 
      do {
        //generate a random string using Laravel's str_random helper
        $token = Str::random(16);
    } //check if the token already exists and if it does, try again
    while (Invite::where('token', $token)->first());
    $this->validate($request , ['name' =>'required' ,
        'email'=>'email|required' , 'entreprise_id'=>'required']);

 
    //create a new invite record
    
        $invite = new Invite();
        $invite->name = $request->input('name');
        $invite->email= $request->input('email');
        $invite->entreprise_id= $request->input('entreprise_id');
        $invite->admin_id= Session::get('admin')->id;
        $invite->token =$token;
        $invite->save(); 
    // send the email
         $history = new History();
         $history->admin_id = Session::get('admin')->id ;
         $entreprise = Entreprise::where('id', $invite->entreprise_id)->first();
         $admin_name = Session::get('admin')->name ;
         $history->employee_email = $invite->email;
         $history->description = $admin_name." invited ".$invite->name." to join ".$entreprise->name;
         $history->save();
    try {
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to send invite: ' . $e->getMessage());
    }   
 
    // redirect back where we came from
    return redirect()
        ->back()->with('status', 'invitation envoyée');

}

public function accept($token)
{
    
    // Look up the invite
    if (!$invite = Invite::where('token', $token)->first()) {
    //if the invite doesn't exist do something more graceful than this
        abort(404);
    }
    $history = new History();
    $admin =Admin::find($invite->admin_id);
    $entreprise = Entreprise::find($invite->entreprise_id);
    // create the user with the details from the invite
    /*$history=History::where('employee_email',$invite->email)->where('admin_id',$invite->admin_id)->first();
   if($history){
    $history->description = " Employé ".$invite->name." a accéder au lien de l'invitation de ".$admin->name." à rejoindre ".$entreprise->name;
    $history->update();}*/
   
    
    // delete the invite so it can't be used again
  // $invite->delete();
 
    // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
 
    return view('employee.completprofile', [
        'admin_id' => Session::get('admin')->id,
        'entreprise_id' => $invite->entreprise_id,
        'email' => $invite->email , 
        'nom' => $invite->name
    ]);
}

    public function invitation_gestion(){
        $invitations = Invite::with('admin')->with('entreprise')->get();
        return view('admin.invitation_gestion')->with('invitations', $invitations);
    }

    public function delete_invitation($id){
        $invitation = Invite::find($id);  
        $admin = Session::get('admin');
        $history = History::where('employee_email' , $invitation->email)->get()->first();      
        $history->description = "l'invitation a été supprimé par ".$admin->name ;
        $history->update();
        $invitation->delete();
        return back()->with('status', 'invitation deleted');
    }

}

