<?php

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
use App\Http\Controllers\Dashbord_Ray_employee\InvoiceController;
use App\Http\Controllers\LaboratoryEmployee\LaboratoryEmployeeController;
use App\Http\Controllers\LaboratoryEmployee_Dashbord\laboratorieEmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
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

Route::get('laboratorEmploye/dashboard', function () {
    return view('Dashbord.laboratorEmploye_Dashbord.dashboard');
})->middleware(['auth:laboratorEmploye', 'verified'])->name('rayemployee.dashboard');
        ###########################Route End Dashbord Doctor###########################################
Route::prefix('laboratorEmploye')->group(function(){
        Route::middleware(['auth:laboratorEmploye'])->group(function(){
       Route::resource('invoices_Laboratory_employee',laboratorieEmployeController::class);
       ##############################view rays##################
Route::get('/view_Laboratory/{id}',[laboratorieEmployeController::class,'view_Laboratory'])->name('view_Laboratory');
##############################view rays##################

                });
    });
    });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

