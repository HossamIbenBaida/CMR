<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Empolyee;
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
    public function edit_entreprise($id){
        $entreprise = Entreprise::Find($id);
        return view('admin.Editentreprise')->with('entreprise',$entreprise );
    }
    public function updateentreprise(Request $request){
        $this->validate($request , ['name' =>'required' ,
        'description'=>'required|min:4']);
        $entreprise = Entreprise::find($request->input('id'));
        $entreprise->name = $request->input('name');
        $entreprise->description = $request->input('description');
        $entreprise->update();

        return back()->with('status','entreprise a ete mise a jour' );
    }
    public function delete_entreprise($id){

        $entreprise = Entreprise::where('id', $id)->doesntHave('employee')->first();        
        if( $entreprise)
        {
            $entreprise->delete();
        return back()->with('status' , 'l\'entrepise a été supprimé') ;
        }
        return back()->with('error' , 'l\'entrepise a des employées');

    }
}
