<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class EntrepriseController extends Controller
{
    public function entrepriselist(){
        $entreprises = Entreprise::with('admin')->get();
        return view('admin.entrepriseslist')->with('entreprises', $entreprises);;
    }

    public function addentreprise(){
        return view('admin.addentreprise');
    }

      public function saveentreprise(Request $request){
        $this->validate($request , ['name' =>'required' ,
        'description'=>'required|min:4']);
        $entreprise = new Entreprise();
        $entreprise->name = $request->input('name');
        $entreprise->description = $request->input('description');
        $entreprise->admin_id = Session::get('admin')->id ;
        $entreprise->save();
        return back()->with('status' , 'entreprise has been added');
    }

}
