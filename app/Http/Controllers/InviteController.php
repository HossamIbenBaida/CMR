<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Invite;
use App\Models\History;
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
  
    try {
        Mail::to($request->get('email'))->send(new InviteCreated($invite));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to send invite: ' . $e->getMessage());
    }   
 
    // redirect back where we came from
    return redirect()
        ->back();

}

public function accept($token)
{
    
    // Look up the invite
    if (!$invite = Invite::where('token', $token)->first()) {
    //if the invite doesn't exist do something more graceful than this
        abort(404);
    }
    $history = new History();

    // create the user with the details from the invite
   $admin_name = Session::get('admin')->name ;
   $history->admin_id = Session::get('admin')->id ;
   $history->employee_email = $invite->email;
    $entreprise = Entreprise::where('id', $invite->entreprise_id)->first();
    $history->description = $admin_name." invited ".$invite->name." to join ".$entreprise->name;
   if(!History::where('employee_email',$invite->email)->first()){
    $history->save();
   }
    
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

}

