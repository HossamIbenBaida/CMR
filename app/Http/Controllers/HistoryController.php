<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
   public function vuehistory(){
    $histories = History::with('admin')->get();
    return view('admin.vuehistory')->with('histories' , $histories);
   }

}
