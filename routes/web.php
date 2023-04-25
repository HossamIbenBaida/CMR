<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\EmployeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
InviteController*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin_login',[AdminController::class ,'login'])->middleware('notadmin');;
Route::post('/adminaccess',[AdminController::class ,'adminaccess']);
Route::get('accept_invite/{token}',[InviteController::class ,'accept'])->name('accept');
Route::post('/valider_invitation',[EmployeeController::class ,'valider_invitation'])->name('valider_invitation');


Route::middleware('admin')->group(function(){
    Route::get('/admin_logout',[AdminController::class ,'logout']);
    Route::get('/admin',[AdminController::class ,'dashboard']);
    Route::post('/saveentreprise',[EntrepriseController::class ,'saveentreprise']);
    Route::get('/addadmin',[AdminController::class ,'addadmin']);
    Route::post('/saveadmin',[AdminController::class ,'saveadmin']);
    Route::get('/addentreprise',[EntrepriseController::class ,'addentreprise']);
    Route::get('/adminlist', [AdminController::class ,'alladmins']);
    Route::get('/adminlist', [AdminController::class ,'alladmins']);
    Route::get('/entrepriselist', [EntrepriseController::class ,'entrepriselist']);
    Route::get('/invite', [InviteController::class ,'invite'])->name('invite');
    Route::post('/process',[InviteController::class ,'process'])->name('process');
});