<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\Dashbord\DectorsController;
use App\Http\Controllers\Dashbord\doctor\DignosticController;
use App\Http\Controllers\Dashbord\doctor\InvoicesController;
use App\Http\Controllers\Dashbord\doctor\LaboratoryController;
use App\Http\Controllers\Dashbord\doctor\PatientDetailsController;
use App\Http\Controllers\Dashbord\doctor\RaysController;
use App\Http\Controllers\Dashbord\insuranceController;
use App\Http\Controllers\Dashbord\PatientController;
use App\Http\Controllers\Dashbord\PaymentAcountController;
use App\Http\Controllers\Dashbord\ReceptAcountController;
use App\Http\Controllers\Dashbord\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
###########################Route Dashbord User###########################################

###########################Route Dashbord Doctor###########################################

Route::get('doctor/dashboard', function () {
    return view('Dashbord.Doctors.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('doctor.dashboard');
        ###########################Route End Dashbord Doctor###########################################
Route::prefix('doctor')->group(function(){
        Route::middleware(['auth:doctor'])->group(function(){
                   ######################invoices Route doctor################
                   Route::resource('invoices',InvoicesController::class);
                   ######################invoices Route doctor###################
                   ######################Diagnostics Route doctor################
                   Route::resource('Diagnostics',DignosticController::class);
                   ######################Diagnostics Route doctor###################
                   ######################Laboratories Route doctor################
                   Route::resource('Laboratories',LaboratoryController::class);
                   ######################Laboratories Route doctor###################
                   Route::get('CompleatInvoices',[InvoicesController::class,'CompleatInvoices'])->name('CompleatInvoices');
                   Route::get('ReviewInvoices',[InvoicesController::class,'ReviewInvoices'])->name('ReviewInvoices');
       ROute::post('add_review',[DignosticController::class,'add_review'])->name('add_review');
       Route::resource('rays',RaysController::class);
       Route::resource('patient_details',PatientDetailsController::class);

        ###########################Route chat patiet###########################################

    Route::get('/list/patient',CreateChat::class)->name('list.patient');
    Route::get('/chat/patient',Main::class)->name('chat.patient');

##############################ed chat patint with doctor ##################

                });
    });
    });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

