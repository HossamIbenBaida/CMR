<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function invite()
{
    return view('admin.inviteemployee');

}

public function process(Request $request)
{
   // return view('admin.inviteemployee');

}
}
