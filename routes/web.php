<?php

use App\Http\Controllers\Dashbord\doctor\PatientDetailsController;
use App\Http\Controllers\fatooracontroller;
use App\Http\Controllers\Patinat_Dashbord\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        Route::get('/',  function (){
            return view('welcome');
        });
###########################Route Dashbord User###########################################

###########################Route Dashbord Doctor###########################################

Route::get('Patient/dashboard', function () {
    return view('Dashbord.Patient_dashbord.dashboard');
})->middleware(['auth:Patient', 'verified'])->name('Patient.dashboard');
        ###########################Route End Dashbord Doctor###########################################
Route::prefix('Patient')->group(function(){
        Route::middleware(['auth:Patient'])->group(function(){
    Route::resource('Patient_details',PatientController::class);
    Route::get('/Patient_rayshow',[PatientController::class,'RayShow'])->name('Patient_rayshow.patient');
    Route::get('/Payment_rayshow',[PatientController::class,'Payment'])->name('Payment_Paymentshow.patient');
##############################view rays##################
        ###########################Route chat patiet###########################################

    Route::get('/list/doctor',CreateChat::class)->name('list.doctors');
    Route::get('/chat/doctor',Main::class)->name('chat.doctors');

##############################ed chat patint with doctor ##################



});});});

// Route::post('pay',[fatooracontroller::class,'payorder'])->name('pay');
// Route::get('callback',function(){
//     return 'succes';
// })->name('callback');
// Route::get('error',function (){
//     return 'payment faild';
// })->name('error');

