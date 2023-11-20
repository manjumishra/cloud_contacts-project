<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\Usermiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes(['verify'=>true]);
Route::middleware([Usermiddleware::class])->group(function(){
Route::get('/showcontact',[ContactController::class,'showcontact']);
Route::get('/addcontact',[ContactController::class,'addcontact']); 
Route::get('/editcontact/{id}',[ContactController::class,'edit']); 
Route::post('/sendcontact',[ContactController::class,'sendcontact']);
Route::post('/update',[ContactController::class,'update']);
Route::get('/sharebyid/{id}',[ContactController::class,'share']); 
Route::get('/share/{id}',[ContactController::class,'sharedata']); 
Route::get('/delcontact/{id}',[ContactController::class,'delete']); 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
