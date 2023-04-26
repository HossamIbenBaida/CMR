<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HistoryController;
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
    return redirect('signin');
});


Route::get('/signout',[EmployeeController::class ,'signout'])->name('signout');
Route::middleware('employee')->group(function(){
    Route::get('/entreprise/{id}',[EmployeeController::class ,'entreprise'])->name('entreprise');
    Route::get('/profile/{id}',[EmployeeController::class ,'profile'])->name('profile');
    Route::get('/Editprofile/{id}',[EmployeeController::class ,'Editprofile'])->name('Editprofile');
    Route::post('/updateprofile',[EmployeeController::class ,'updateprofile']);
});

Route::get('/admin_login',[AdminController::class ,'login'])->middleware('notadmin');
Route::post('/adminaccess',[AdminController::class ,'adminaccess']);
Route::get('accept_invite/{token}',[InviteController::class ,'accept'])->name('accept');
Route::post('/valider_invitation',[EmployeeController::class ,'valider_invitation'])->name('valider_invitation');
Route::get('/signin',[EmployeeController::class ,'signin'])->middleware('NotEmployee');
Route::post('/access_account',[EmployeeController::class ,'access_account']);

Route::middleware('admin')->group(function(){
    Route::get('/admin_logout',[AdminController::class ,'logout']);
    Route::get('/admin',[AdminController::class ,'dashboard']);
    Route::post('/saveentreprise',[EntrepriseController::class ,'saveentreprise']);
    Route::get('/addadmin',[AdminController::class ,'addadmin']);
    Route::post('/saveadmin',[AdminController::class ,'saveadmin']);
    Route::get('/addentreprise',[EntrepriseController::class ,'addentreprise']);
    Route::get('/adminlist', [AdminController::class ,'alladmins']);
    Route::get('/entrepriselist', [EntrepriseController::class ,'entrepriselist']);
    Route::get('/invite', [InviteController::class ,'invite'])->name('invite');
    Route::get('/employees_list', [EmployeeController::class ,'employees_list'])->name('employees_list');
    Route::get('/invitation_gestion', [InviteController::class ,'invitation_gestion'])->name('invitation_gestion');
    Route::get('/delete_invitation/{id}', [InviteController::class ,'delete_invitation'])->name('delete_invitation');
    Route::post('/process',[InviteController::class ,'process'])->name('process');
    Route::post('/updateentreprise',[EntrepriseController::class ,'updateentreprise'])->name('updateentreprise');
    Route::get('/edit_entreprise/{id}',[EntrepriseController::class ,'edit_entreprise'])->name('edit_entreprise');
    Route::get('/delete_entreprise/{id}',[EntrepriseController::class ,'delete_entreprise'])->name('delete_entreprise');
    Route::get('/vuehistory',[HistoryController::class ,'vuehistory'])->name('vuehistory');

    
});