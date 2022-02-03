<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Updateuser;
use App\Http\Middleware\Logdata;

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


// Call Using Contoller
Route::get('profile', [Users::class, 'profile']);
Route::get('price', [Users::class, 'pricelist']);
Route::get('/', [Users::class, 'login']);
Route::get('registration', [Users::class, 'registration']);
Route::post('login1',[Users::class,'login1']);
Route::post('registration1',[Users::class,'registration1']);

Route::group(['middleware'=>['logdata']],function(){
    Route::get('index', [Users::class, 'crm']);
    Route::get('app-chat', [Users::class, 'chat']);
    Route::get('community', [Users::class, 'community']);
    Route::get('team', [Users::class, 'team']);
    Route::get('manage-team/{id}', [Users::class, 'manageteam']);
    Route::get('manageteam', [Users::class, 'manageteam1']);
    Route::get('monitering', [Users::class, 'monitering']);
    Route::get('project-details/{id}', [Users::class, 'projectdetail']);
    Route::get('completeproject/{id}', [Users::class, 'completeproject']);
    Route::get('projectdetails', [Users::class, 'projectdetails']);
    Route::get('tasklist', [Users::class, 'tasklist']);
    Route::get('problem-show/{id}/{user}', [Users::class, 'problemshow']);
    Route::get('problem-show', [Users::class, 'problemshow1']);
    Route::get('logout', [Users::class, 'logout']);
    Route::get('addmember', [Users::class, 'addmember']);

    Route::get('tasklist1/{count}/{status}',[Updateuser::class, 'tasklist1']);
    Route::get('edittask/{id}',[Updateuser::class, 'edittask1']);
    Route::get('deletetask/{id}',[Updateuser::class, 'deletetask']);
    Route::get('edittask',[Updateuser::class, 'edittask']);
    Route::post('updatetask',[Updateuser::class,'updatetask']);
    Route::post('addtask',[Updateuser::class,'addtask']);
    Route::post('addmember',[Updateuser::class,'addmember']);
    Route::post('updateprofile',[Updateuser::class,'updateprofile']);
    Route::get('addproject',[Updateuser::class,'addproject']);
    Route::post('addproject1',[Updateuser::class,'addproject1']);
    Route::post('addquestion',[Updateuser::class,'addquestion']);
    Route::get('deletequestion/{id}',[Updateuser::class,'deletequestion']);
    Route::get('deletesolution/{id}',[Updateuser::class,'deletesolution']);

    Route::post('addsolution',[Updateuser::class,'addsolution']);
    Route::post('chat1',[Updateuser::class,'chat1']);
});